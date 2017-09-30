<?php
/**
 * EVEAuthTest.
 *
 * @category Class
 *
 * @author   Anthony Grimes <contact@anthonygrimes.co.uk>
 *
 * @link     https://github.com/aGrimes94/eve-auth
 *
 * @license MIT
 */

namespace AGrimes94\EVEAuth\Tests;

use AGrimes94\EVEAuth\EVEAuth;
use AGrimes94\EVEAuth\EVEAuthConfiguration;
use PHPUnit\Framework\TestCase;

/**
 * EVEAuthTest.
 *
 * @category Class
 *
 * @author   Anthony Grimes <contact@anthonygrimes.co.uk>
 *
 * @link     https://github.com/aGrimes94/eve-auth
 *
 * @license MIT
 */
class EVEAuthTest extends TestCase
{
    protected $eve_auth_client;

    public function setUp()
    {
        $this->eve_auth_client = new EVEAuth();
    }

    public function testEVEAuthInstantiation()
    {
        $this->assertInstanceOf(EVEAuth::class, $this->eve_auth_client);
    }

    public function testEVEAuthAcceptsConfiguration()
    {
        $eve_auth_configuration = new EVEAuthConfiguration();

        $eve_auth_client = new EVEAuth($eve_auth_configuration);

        $this->assertInstanceOf(EVEAuth::class, $eve_auth_client);
    }

    public function testSettersReturnClient()
    {
        $this->assertInstanceOf(EVEAuth::class, $this->eve_auth_client->setClientId('CLIENT_ID'));

        $this->assertInstanceOf(EVEAuth::class, $this->eve_auth_client->setSecretKey('SECRET_KEY'));

        $this->assertInstanceOf(EVEAuth::class, $this->eve_auth_client->setCertVerification(false));
    }
}
