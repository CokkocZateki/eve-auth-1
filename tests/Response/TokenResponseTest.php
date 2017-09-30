<?php
/**
 * TokenResponseTest.
 *
 * @category Class
 *
 * @author   Anthony Grimes <contact@anthonygrimes.co.uk>
 *
 * @link     https://github.com/aGrimes94/eve-auth
 *
 * @license MIT
 */

namespace AGrimes94\EVEAuth\Tests\Response;

use AGrimes94\EVEAuth\Response\TokenResponse;
use PHPUnit\Framework\TestCase;

/**
 * TokenResponseTest.
 *
 * @category Class
 *
 * @author   Anthony Grimes <contact@anthonygrimes.co.uk>
 *
 * @link     https://github.com/aGrimes94/eve-auth
 *
 * @license MIT
 */
class TokenResponseTest extends TestCase
{
    protected $token_response;

    public function setUp()
    {
        $this->token_response = new TokenResponse('ACCESS_TOKEN', 'TOKEN_TYPE', 'EXPIRES_IN', 'REFRESH_TOKEN');
    }

    public function testTokenResponseInstantiation()
    {
        $this->assertInstanceOf(TokenResponse::class, $this->token_response);
    }
}
