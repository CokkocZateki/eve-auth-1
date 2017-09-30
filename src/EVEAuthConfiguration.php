<?php
/**
 * EVEAuthConfiguration
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

/**
 * EVEAuthConfiguration
 *
 * @category Class
 *
 * @author   Anthony Grimes <contact@anthonygrimes.co.uk>
 *
 * @link     https://github.com/aGrimes94/eve-auth
 *
 * @license MIT
 */
class EVEAuthConfiguration
{
    /**
     * @var string
     */
    protected $token_uri = 'https://login.eveonline.com/oauth/token';

    /**
     * @var string
     */
    protected $verification_token_uri = 'https://login.eveonline.com/oauth/verify';

    /**
     * @var string
     */
    protected $client_id = '';

    /**
     * @var string
     */
    protected $secret_key = '';

    /**
     * @var bool
     */
    protected $cert_verification = true;

    /**
     * @return string
     */
    public function getAuthHeader(): string
    {
        return base64_encode($this->client_id . ':' . $this->secret_key);
    }

    /**
     * @return string
     */
    public function getTokenUri(): string
    {
        return $this->token_uri;
    }

    /**
     * @param string $token_uri
     */
    public function setTokenUri(string $token_uri)
    {
        $this->token_uri = $token_uri;
    }

    /**
     * @return string
     */
    public function getVerificationTokenUri(): string
    {
        return $this->verification_token_uri;
    }

    /**
     * @param string $verification_token_uri
     */
    public function setVerificationTokenUri(string $verification_token_uri)
    {
        $this->verification_token_uri = $verification_token_uri;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->client_id;
    }

    /**
     * @param string $client_id
     */
    public function setClientId(string $client_id)
    {
        $this->client_id = $client_id;
    }

    /**
     * @return string
     */
    public function getSecretKey(): string
    {
        return $this->secret_key;
    }

    /**
     * @param string $secret_key
     */
    public function setSecretKey(string $secret_key)
    {
        $this->secret_key = $secret_key;
    }

    /**
     * @return bool
     */
    public function isCertVerification(): bool
    {
        return $this->cert_verification;
    }

    /**
     * @param bool $cert_verification
     */
    public function setCertVerification(bool $cert_verification)
    {
        $this->cert_verification = $cert_verification;
    }
}
