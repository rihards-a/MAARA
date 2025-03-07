<?php

namespace App\Http\Controllers; // Original had App\Http\Controllers\Api

use App\Services\SmartIdClientService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class SmartIdApiController extends Controller
{
    protected SmartIdClientService $smartIdClientService;

    public function __construct(SmartIdClientService $smartIdClientService)
    {
        $this->smartIdClientService = $smartIdClientService;
    }

    /**
     * Initiate authentication using Smart‑ID.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function initiateAuthentication(Request $request)
    {
        $data = $request->validate([
            'semantics_identifier_type' => 'required|string|in:PNO,IDC,PAS',
            'country_code' => 'required|string|size:2|in:EE,LV,LT',
            'identifier' => 'required|string',
            'display_text' => 'nullable|string|max:60',
        ]);

        // Generate hash and verification code
        $hashData = $this->smartIdClientService->generateAuthenticationHash();
        $authenticationHash = $hashData['hash'];
        
        // Generate a unique auth session ID
        $authSessionId = Str::uuid()->toString();
        
        // Store authentication hash in cache for verification during polling
        Cache::put("smartid_auth:{$authSessionId}:hash", serialize($authenticationHash), now()->addMinutes(10));
        
        // Default display text if not provided
        $displayText = $data['display_text'] ?? 'Authentication request';
        
        try {
            // Start authentication session and return session ID
            $sessionId = $this->smartIdClientService->startAuthenticationSession(
                $data['semantics_identifier_type'],
                strtoupper($data['country_code']),
                $data['identifier'],
                $authenticationHash,
                $displayText
            );
            
            // Store session ID in cache for polling
            Cache::put("smartid_auth:{$authSessionId}:session_id", $sessionId, now()->addMinutes(10));
            
            return response()->json([
                'success' => true,
                'verification_code' => $hashData['verificationCode'],
                'auth_session_id' => $authSessionId,
            ]);
        } catch (\RuntimeException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    /**
     * Poll for authentication status
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function pollAuthenticationStatus(Request $request)
    {
        $request->validate([
            'auth_session_id' => 'required|string|uuid'
        ]);
        
        $authSessionId = $request->input('auth_session_id');
        $sessionId = Cache::get("smartid_auth:{$authSessionId}:session_id");
        $authenticationHash = unserialize(Cache::get("smartid_auth:{$authSessionId}:hash"));
        
        if (!$sessionId || !$authenticationHash) {
            return response()->json(['error' => 'No active authentication session'], 400);
        }
        
        try {
            $status = $this->smartIdClientService->pollAuthenticationSessionStatus($sessionId, $authenticationHash);
            
            if ($status['complete']) {
                // Authentication is complete
                $userIdentity = $status['identity'];
                
                // Clear cache entries, no longer needed
                Cache::forget("smartid_auth:{$authSessionId}:session_id");
                Cache::forget("smartid_auth:{$authSessionId}:hash");
                
                // Find or create user based on document number
                $user = $this->findOrCreateUser($userIdentity, $status['documentNumber']);
                
                // Create Sanctum token
                $token = $user->createToken('smartid-auth')->plainTextToken;
                
                return response()->json([
                    'success' => true,
                    'complete' => true,
                    'user' => $this->formatUserIdentity($userIdentity),
                    'token' => $token
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
     * Find or create a user based on Smart-ID identity
     * 
     * @param object $userIdentity
     * @param string $documentNumber
     * @return User
     */
    protected function findOrCreateUser($userIdentity, $documentNumber)
    {
        $user = User::firstOrCreate(
            ['document_number' => $documentNumber],
            [
                'name' => $userIdentity->getGivenName() . ' ' . $userIdentity->getSurName(),
                // 'email' => strtolower($userIdentity->getGivenName() . '.' . $userIdentity->getSurName() . '@example.com'), // This should be changed in production
                'password' => bcrypt(Str::random(16)), // Generate random password - user won't use it
                'country' => $userIdentity->getCountry(),
                'date_of_birth' => $userIdentity->getDateOfBirth()->format('Y-m-d'),
            ]
        );
        
        return $user;
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
        ];
    }
    
    /**
     * Revoke the current token (logout)
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        // Revoke the token that was used to authenticate the current request
        $request->user()->currentAccessToken()->delete();
        
        return response()->json(['message' => 'Successfully logged out']);
    }
}