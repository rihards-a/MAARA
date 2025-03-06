<?php

namespace App\Http\Controllers;

use App\Services\SmartIdClientService;
use Illuminate\Http\Request;

class SmartIdController extends Controller
{
    protected SmartIdClientService $smartIdClientService;

    public function __construct(SmartIdClientService $smartIdClientService)
    {
        $this->smartIdClientService = $smartIdClientService;
    }

    /**
     * Initiate authentication using Smart‑ID.
     *
     * Expects input parameters:
     * - semantics_identifier_type (e.g., 'PNO')
     * - country_code (e.g., 'LT')
     * - identifier (the actual identifier value)
     */
    public function authenticate(Request $request)
    {
        $data = $request->validate([
            'semantics_identifier_type' => 'required|string',
            'country_code'              => 'required|string|size:2',
            'identifier'                => 'required|string',
        ]);

        try {
            $userIdentity = $this->smartIdClientService->authenticateUser(
                $data['semantics_identifier_type'],
                strtoupper($data['country_code']),
                $data['identifier']
            );

            return response()->json([
                'givenName'     => $userIdentity->getGivenName(),
                'surname'       => $userIdentity->getSurName(),
                'country'       => $userIdentity->getCountry(),
                'dateOfBirth'   => $userIdentity->getDateOfBirth()->format('Y-m-d'),
                'documentNumber'=> $userIdentity->getDocumentNumber(),
            ]);
        } catch (\RuntimeException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
