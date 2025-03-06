<?php
/* This service will configure the client with your relying party details, set up HTTPS pinning, 
build the semantics identifier from user input, generate a new authentication hash (and verification code) 
for every authentication request, call the client’s authentication method, and finally validate the authentication response.
*/

namespace App\Services;

use Sk\SmartId\Client;
use Sk\SmartId\Exception\UserRefusedException;
use Sk\SmartId\Exception\UserSelectedWrongVerificationCodeException;
use Sk\SmartId\Exception\SessionTimeoutException;
use Sk\SmartId\Exception\UserAccountNotFoundException;
use Sk\SmartId\Exception\UserAccountException;
use Sk\SmartId\Exception\EnduringSmartIdException;
use Sk\SmartId\Exception\SmartIdException;
use Sk\SmartId\Api\Data\AuthenticationHash;
use Sk\SmartId\Api\Data\CertificateLevelCode;
use Sk\SmartId\Api\Data\SemanticsIdentifier;
use Sk\SmartId\Api\Data\Interaction;
use Sk\SmartId\Api\AuthenticationResponseValidator;


class SmartIdClientService
{
    protected Client $client;
    protected string $trustedCertificatesPath;

    public function __construct()
    {
        // Instantiate and configure the Smart-ID client.
        // The configuration values can be placed in config/services.php.
        $this->client = new Client();
        $this->client
            ->setRelyingPartyUUID(config('services.smartid.relying_party_uuid'))  // e.g., '00000000-0000-0000-0000-000000000000'
            ->setRelyingPartyName(config('services.smartid.relying_party_name'))    // e.g., 'DEMO'
            ->setHostUrl(config('services.smartid.host_url'))                      // e.g., 'https://sid.demo.sk.ee/smart-id-rp/v2/'
            ->setPublicSslKeys(config('services.smartid.public_ssl_keys'));         // e.g., "sha256//Ps1Im3KeB0Q4AlR+/J9KFd/MOznaARdwo4gURPCLaVA="

        // Define the path where trusted Smart-ID certificates are stored.
        // Create a folder named "trusted_certificates" under your resources directory.
        $this->trustedCertificatesPath = config('services.smartid.trusted_certificates_path', resource_path('trusted_certificates'));
    }

    /**
     * Authenticate a user using their semantics identifier.
     *
     * @param string $semanticsIdentifierType (e.g., 'PNO', 'IDC', or 'PAS')
     * @param string $countryCode             (e.g., 'LT', 'EE', etc.)
     * @param string $identifier              (the identifier value)
     *
     * @return object Authentication identity details
     *
     * @throws \RuntimeException When authentication fails or the response is invalid.
     */
    public function authenticateUser(string $semanticsIdentifierType, string $countryCode, string $identifier)
    {
        // Build the semantics identifier for the user.
        $semanticsIdentifier = SemanticsIdentifier::builder()
            ->withSemanticsIdentifierType($semanticsIdentifierType)
            ->withCountryCode($countryCode)
            ->withIdentifier($identifier)
            ->build();

        // Generate a fresh authentication hash. This also allows calculating a verification code.
        $authenticationHash = AuthenticationHash::generate();
        $verificationCode = $authenticationHash->calculateVerificationCode();

        // (Optionally) pass the verification code to your view so the user can check it.
        // For example: session()->flash('verification_code', $verificationCode);

        try {
            // Start the authentication process.
            // The call will block until the user interacts via the Smart‑ID app.
            $authenticationResponse = $this->client->authentication()
                ->createAuthentication()
                ->withSemanticsIdentifier($semanticsIdentifier)
                ->withAuthenticationHash($authenticationHash)
                ->withCertificateLevel(CertificateLevelCode::QUALIFIED)
                ->withAllowedInteractionsOrder([
                    Interaction::ofTypeVerificationCodeChoice("Enter awesome portal?"),
                    Interaction::ofTypeDisplayTextAndPIN("Enter awesome portal?")
                ])
                ->authenticate();
        } catch (UserRefusedException $e) {
            throw new \RuntimeException("You pressed cancel in Smart‑ID app.");
        } catch (UserSelectedWrongVerificationCodeException $e) {
            throw new \RuntimeException("Wrong verification code selected. Please try again.");
        } catch (SessionTimeoutException $e) {
            throw new \RuntimeException("Session timed out (PIN was not entered in time).");
        } catch (UserAccountNotFoundException $e) {
            throw new \RuntimeException("User does not have a Smart‑ID account.");
        } catch (UserAccountException $e) {
            throw new \RuntimeException("A problem occurred with your Smart‑ID account.");
        } catch (EnduringSmartIdException $e) {
            throw new \RuntimeException("Connection problem with Smart‑ID service. Please try again later.");
        } catch (SmartIdException $e) {
            throw new \RuntimeException("Smart‑ID authentication failed: " . $e->getMessage());
        }

        // Validate the authentication response using a validator that checks the signature and certificate.
        $validator = new AuthenticationResponseValidator($this->trustedCertificatesPath);
        $authenticationResult = $validator->validate($authenticationResponse);

        if (!$authenticationResult->isValid()) {
            $errors = implode(", ", $authenticationResult->getErrors());
            throw new \RuntimeException("Authentication response is not valid: " . $errors);
        }

        // Return the authenticated user's identity details.
        return $authenticationResult->getAuthenticationIdentity();
    }
}
