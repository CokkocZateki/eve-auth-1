<?php
/**
 * VerifyResponseTest.
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

use AGrimes94\EVEAuth\Response\VerifyResponse;
use PHPUnit\Framework\TestCase;

/**
 * VerifyResponseTest.
 *
 * @category Class
 *
 * @author   Anthony Grimes <contact@anthonygrimes.co.uk>
 *
 * @link     https://github.com/aGrimes94/eve-auth
 *
 * @license MIT
 */
class VerifyResponseTest extends TestCase
{
    protected $verify_response;

    public function setUp()
    {
        $this->verify_response = new VerifyResponse('CHARACTER_ID', 'CHARACTER_NAME', 'EXPIRES_ON', 'SCOPES',
            'TOKEN_TYPE', 'CHARACTER_OWNER_HASH');
    }

    public function testVerifyResponseInstantiation()
    {
        $this->assertInstanceOf(VerifyResponse::class, $this->verify_response);
    }
}
