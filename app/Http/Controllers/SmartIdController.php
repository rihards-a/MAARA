<?php

namespace App\Http\Controllers;

use App\Services\SmartIdClientService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SmartIdController extends Controller
{
    protected SmartIdClientService $smartIdClientService;

    public function __construct(SmartIdClientService $smartIdClientService)
    {
        $this->smartIdClientService = $smartIdClientService;
    }

    /**
     * Display the authentication form
     */
    public function showAuthenticationForm()
    {
        return view('auth.smartid');
    }

    /**
     * Initiate authentication using Smart‑ID.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(Request $request)
    {
        $data = $request->validate([
            'semantics_identifier_type' => 'required|string',
            'country_code' => 'required|string|size:2',
            'identifier' => 'required|string',
            'use_polling' => 'boolean',
            'display_text' => 'nullable|string|max:60',
        ]);

        // Generate hash and verification code
        $hashData = $this->smartIdClientService->generateAuthenticationHash();
        $authenticationHash = $hashData['hash'];
        
        // Store authentication hash in session for verification during polling
        Session::put('smartid_auth_hash', serialize($authenticationHash));
        
        // Default display text if not provided
        $displayText = $data['display_text'] ?? 'Authentication request';
        
        // Decide whether to use polling or direct authentication
        if ($data['use_polling'] ?? false) {
            try {
                // Start authentication session and return session ID
                $sessionId = $this->smartIdClientService->startAuthenticationSession(
                    $data['semantics_identifier_type'],
                    strtoupper($data['country_code']),
                    $data['identifier'],
                    $authenticationHash,
                    $displayText
                );
                
                // Store session ID in the session for polling
                Session::put('smartid_session_id', $sessionId);
                
                return response()->json([
                    'success' => true,
                    'verification_code' => $hashData['verificationCode'],
                    'session_id' => $sessionId,
                    'polling_url' => route('smartid.poll'),
                ]);
            } catch (\RuntimeException $e) {
                return response()->json(['error' => $e->getMessage()], 400);
            }
        } else {
            // Direct authentication (blocking)
            try {
                $userIdentity = $this->smartIdClientService->authenticateUser(
                    $data['semantics_identifier_type'],
                    strtoupper($data['country_code']),
                    $data['identifier']
                );
                
                // Store authentication data in session
                $this->storeAuthenticationInSession($userIdentity);
                
                return response()->json([
                    'success' => true,
                    'user' => $this->formatUserIdentity($userIdentity),
                ]);
            } catch (\RuntimeException $e) {
                return response()->json(['error' => $e->getMessage()], 400);
            }
        }
    }

    /**
     * Poll for authentication status
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function pollAuthenticationStatus()
    {
        $sessionId = Session::get('smartid_session_id');
        $authenticationHash = unserialize(Session::get('smartid_auth_hash'));
        
        if (!$sessionId || !$authenticationHash) {
            return response()->json(['error' => 'No active authentication session'], 400);
        }
        
        try {
            $status = $this->smartIdClientService->pollAuthenticationSessionStatus($sessionId, $authenticationHash);
            
            if ($status['complete']) {
                // Authentication is complete, store in session
                $this->storeAuthenticationInSession($status['identity']);
                
                // Clear session ID, no longer needed
                Session::forget('smartid_session_id');
                Session::forget('smartid_auth_hash');
                
                return response()->json([
                    'success' => true,
                    'complete' => true,
                    'user' => $this->formatUserIdentity($status['identity']),
                    'document_number' => $status['documentNumber'],
                ]);
            }
            
            // Authentication still in progress
            return response()->json([
                'success' => true,
                'complete' => false,
                'state' => $status['state'],
            ]);
        } catch (\RuntimeException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    /**
     * Store authentication data in session
     * 
     * @param object $userIdentity
     */
    protected function storeAuthenticationInSession($userIdentity)
    {
        Session::put('smartid_authenticated', true);
        Session::put('smartid_user', [
            'given_name' => $userIdentity->getGivenName(),
            'surname' => $userIdentity->getSurName(),
            'country' => $userIdentity->getCountry(),
            'date_of_birth' => $userIdentity->getDateOfBirth()->format('Y-m-d'),
            'document_number' => $userIdentity->getDocumentNumber(),
        ]);
    }

    /**
     * Format user identity for response
     * 
     * @param object $userIdentity
     * @return array
     */
    protected function formatUserIdentity($userIdentity)
    {
        return [
            'given_name' => $userIdentity->getGivenName(),
            'surname' => $userIdentity->getSurName(),
            'country' => $userIdentity->getCountry(),
            'date_of_birth' => $userIdentity->getDateOfBirth()->format('Y-m-d'),
            'document_number' => $userIdentity->getDocumentNumber(),
        ];
    }
    
    /**
     * Check if user is authenticated
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkAuthenticationStatus()
    {
        if (Session::get('smartid_authenticated')) {
            return response()->json([
                'authenticated' => true,
                'user' => Session::get('smartid_user'),
            ]);
        }
        
        return response()->json(['authenticated' => false]);
    }
    
    /**
     * Logout / clear Smart-ID authentication
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Session::forget('smartid_authenticated');
        Session::forget('smartid_user');
        
        return response()->json(['success' => true]);
    }
}