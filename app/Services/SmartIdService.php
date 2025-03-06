<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Sk\SmartId\Api\AuthenticationResponseValidator;
use Sk\SmartId\Api\Data\AuthenticationHash;
use Sk\SmartId\Api\Data\CertificateLevelCode;
use Sk\SmartId\Api\Data\Interaction;
use Sk\SmartId\Api\Data\SemanticsIdentifierBuilder;
use Sk\SmartId\Api\Data\SemanticsIdentifierTypes;
use Sk\SmartId\Client;
use Sk\SmartId\Exception\SmartIdException;
use Throwable;

class SmartIdService
{
    protected Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function generateAuthenticationHash(): AuthenticationHash
    {
        return AuthenticationHash::generate();
    }

    public function authenticate(string $nationalIdentityNumber, string $country, AuthenticationHash $authHash): array
    {
        $identity = (new SemanticsIdentifierBuilder())
            ->withSemanticsIdentifierType(SemanticsIdentifierTypes::PNO)
            ->withCountryCode(strtoupper($country))
            ->withIdentifier($nationalIdentityNumber)
            ->build();

        try {
            $authenticationResponse = $this->client->authentication()
                ->createAuthentication()
                ->withSemanticsIdentifier($identity)
                ->withAuthenticationHash($authHash)
                ->withAllowedInteractionsOrder([
                    Interaction::ofTypeConfirmationMessageAndVerificationCodeChoice("Please confirm login"),
                    Interaction::ofTypeDisplayTextAndPIN("Login to Application"),
                ])
                ->withCertificateLevel(CertificateLevelCode::QUALIFIED)
                ->authenticate();

            $fullName = $authenticationResponse->getCertificateInstance()->getSubject()->getCN();

            $validator = new AuthenticationResponseValidator();

            foreach (config('smart_id.trusted_ca_certificates', []) as $cert) {
                $validator->addTrustedCACertificateLocation($cert);
            }

            $result = $validator->validate($authenticationResponse);

            if (!$result->isValid()) {
                Log::error('Smart-ID authentication validation failed', [
                    'errors' => $result->getErrors(),
                ]);

                return [
                    'success' => false,
                    'errors' => $result->getErrors(),
                ];
            }

            return [
                'success' => true,
                'fullName' => $fullName,
                'identityNumber' => $nationalIdentityNumber,
                'country' => $country,
            ];
        } catch (SmartIdException | Throwable $e) {
            Log::error('Smart-ID authentication failed', [
                'exception' => get_class($e),
                'message' => $e->getMessage(),
            ]);

            return [
                'success' => false,
                'error' => $e->getMessage(),
                'errorType' => get_class($e),
            ];
        }
    }

    public function findOrCreateUser(array $data): User
    {
        $user = User::firstOrCreate(
            [
                'national_identity_number' => $data['identityNumber'],
                'country_code' => $data['country'],
            ],
            [
                'name' => $data['fullName'],
                'email' => $data['identityNumber'] . '@smartid.example', // Placeholder email
                'password' => Hash::make(Str::random(32)),
                'full_name' => $data['fullName'],
            ]
        );

        $user->update(['last_login_at' => now()]);

        return $user;
    }
}
