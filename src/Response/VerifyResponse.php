<?php
/**
 * VerifyResponse
 *
 * @category Class
 *
 * @author   Anthony Grimes <contact@anthonygrimes.co.uk>
 *
 * @link     https://github.com/aGrimes94/eve-auth
 *
 * @license MIT
 */

namespace AGrimes94\EVEAuth\Response;

/**
 * VerifyResponse
 *
 * @category Class
 *
 * @author   Anthony Grimes <contact@anthonygrimes.co.uk>
 *
 * @link     https://github.com/aGrimes94/eve-auth
 *
 * @license MIT
 */
class VerifyResponse
{
    /**
     * @var string
     */
    protected $character_id;

    /**
     * @var string
     */
    protected $character_name;

    /**
     * @var string
     */
    protected $expires_on;

    /**
     * @var string
     */
    protected $scopes;

    /**
     * @var string
     */
    protected $token_type;

    /**
     * @var string
     */
    protected $character_owner_hash;

    /**
     * VerifyResponse constructor.
     *
     * @param string $character_id
     * @param string $character_name
     * @param string $expires_on
     * @param string $scopes
     * @param string $token_type
     * @param string $character_owner_hash
     */
    public function __construct(
        string $character_id,
        string $character_name,
        string $expires_on,
        string $scopes,
        string $token_type,
        string $character_owner_hash
    ) {
        $this->character_id = $character_id;
        $this->character_name = $character_name;
        $this->expires_on = $expires_on;
        $this->scopes = $scopes;
        $this->token_type = $token_type;
        $this->character_owner_hash = $character_owner_hash;
    }

    /**
     * @return string
     */
    public function getCharacterId(): string
    {
        return $this->character_id;
    }

    /**
     * @return string
     */
    public function getCharacterName(): string
    {
        return $this->character_name;
    }

    /**
     * @return string
     */
    public function getExpiresOn(): string
    {
        return $this->expires_on;
    }

    /**
     * @return string
     */
    public function getScopes(): string
    {
        return $this->scopes;
    }

    /**
     * @return string
     */
    public function getTokenType(): string
    {
        return $this->token_type;
    }

    /**
     * @return string
     */
    public function getCharacterOwnerHash(): string
    {
        return $this->character_owner_hash;
    }
}
