<?php
/**
 * EVEAuth.
 *
 * @category Class
 *
 * @author   Anthony Grimes <contact@anthonygrimes.co.uk>
 *
 * @link     https://github.com/aGrimes94/eve-auth
 *
 * @license MIT
 */

namespace AGrimes94\EVEAuth;

use AGrimes94\EVEAuth\Response\TokenResponse;
use AGrimes94\EVEAuth\Response\VerifyResponse;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

/**
 * EVEAuth.
 *
 * @category Class
 *
 * @author   Anthony Grimes <contact@anthonygrimes.co.uk>
 *
 * @link     https://github.com/aGrimes94/eve-auth
 *
 * @license MIT
 */
class EVEAuth
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @var \AGrimes94\EVEAuth\EVEAuthConfiguration
     */
    protected $eve_auth_configuration;

    /**
     * EVEAuth constructor.
     *
     * @param \AGrimes94\EVEAuth\EVEAuthConfiguration|null $eve_auth_configuration
     */
    public function __construct(
        EVEAuthConfiguration $eve_auth_configuration = null
    ) {
        $this->eve_auth_configuration = $eve_auth_configuration ?: new EVEAuthConfiguration();
        $this->client = new Client();
    }

    /**
     * @param string $client_id
     *
     * @return \AGrimes94\EVEAuth\EVEAuth
     */
    public function setClientId(string $client_id): self
    {
        $this->eve_auth_configuration->setClientId($client_id);

        return $this;
    }

    /**
     * @param string $secret_key
     *
     * @return \AGrimes94\EVEAuth\EVEAuth
     */
    public function setSecretKey(string $secret_key): self
    {
        $this->eve_auth_configuration->setSecretKey($secret_key);

        return $this;
    }

    /**
     * @param string $cert_verification
     *
     * @return \AGrimes94\EVEAuth\EVEAuth
     */
    public function setCertVerification(string $cert_verification): self
    {
        $this->eve_auth_configuration->setCertVerification($cert_verification);

        return $this;
    }

    /**
     * @param \GuzzleHttp\Psr7\Response $response
     *
     * @return array
     */
    private function decodeRequestBody(Response $response): array
    {
        return json_decode($response->getBody(), true);
    }

    /**
     * @return \AGrimes94\EVEAuth\Response\TokenResponse
     */
    public function requestToken(): TokenResponse
    {
        $request = $this->client->request('POST', $this->eve_auth_configuration->getTokenUri(),
            [
                'headers'     => ['Authorization' => ' Basic ' . $this->eve_auth_configuration->getAuthHeader()],
                'form_params' => [
                    'grant_type' => 'authorization_code',
                    'code'       => $_REQUEST['code'], // TODO Must be a better way of doing this
                ],
                'verify' => $this->eve_auth_configuration->isCertVerification(),
            ]
        );

        $response_array = $this->decodeRequestBody($request);

        return $this->createTokenResponse($response_array);
    }

    /**
     * @param array $response_array
     *
     * @return \AGrimes94\EVEAuth\Response\TokenResponse
     */
    private function createTokenResponse(array $response_array): TokenResponse
    {
        return new TokenResponse(
            $response_array['access_token'],
            $response_array['token_type'],
            $response_array['expires_in'],
            $response_array['refresh_token']
        );
    }

    /**
     * @param string $access_token
     *
     * @return \AGrimes94\EVEAuth\Response\VerifyResponse
     */
    public function verifyToken(string $access_token): VerifyResponse
    {
        $request = $this->client->request('GET', $this->eve_auth_configuration->getVerificationTokenUri(),
            [
                'headers' => ['Authorization' => 'Bearer ' . $access_token],
                'verify'  => $this->eve_auth_configuration->isCertVerification(),
            ]
        );

        $response_array = $this->decodeRequestBody($request);

        return $this->createVerifyTokenRequest($response_array);
    }

    /**
     * @param array $response_array
     *
     * @return \AGrimes94\EVEAuth\Response\VerifyResponse
     */
    private function createVerifyTokenRequest(array $response_array): VerifyResponse
    {
        return new VerifyResponse(
            $response_array['CharacterID'],
            $response_array['CharacterName'],
            $response_array['ExpiresOn'],
            $response_array['Scopes'],
            $response_array['TokenType'],
            $response_array['CharacterOwnerHash']
        );
    }

    /**
     * @param string $refresh_token
     *
     * @return \AGrimes94\EVEAuth\Response\TokenResponse
     */
    public function refreshToken(string $refresh_token): TokenResponse
    {
        $request = $this->client->request('POST', $this->eve_auth_configuration->getTokenUri(),
            [
                'headers'     => ['Authorization' => 'Basic ' . $this->eve_auth_configuration->getAuthHeader()],
                'form_params' => [
                    'grant_type'    => 'refresh_token',
                    'refresh_token' => $refresh_token,
                ],
                'verify' => $this->eve_auth_configuration->isCertVerification(),
            ]
        );

        $response_array = $this->decodeRequestBody($request);

        return $this->createTokenResponse($response_array);
    }
}
