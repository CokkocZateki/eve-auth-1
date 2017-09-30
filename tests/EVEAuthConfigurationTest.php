<?php
/**
 * EVEAuthConfigurationTest.
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
 * EVEAuthConfigurationTest.
 *
 * @category Class
 *
 * @author   Anthony Grimes <contact@anthonygrimes.co.uk>
 *
 * @link     https://github.com/aGrimes94/eve-auth
 *
 * @license MIT
 */
class EVEAuthConfigurationTest extends TestCase
{
    protected $eve_auth_client;

    protected $eve_auth_configuration;

    public function setUp()
    {
        $this->eve_auth_client = new EVEAuth();
        $this->eve_auth_configuration = new EVEAuthConfiguration();
    }

    public function testEVEAuthConfigurationInstantiation()
    {
        $this->assertInstanceOf(EVEAuthConfiguration::class, $this->eve_auth_configuration);
    }

    public function testEVEAuthConfigurationDefaultValues()
    {
        $this->assertEquals('https://login.eveonline.com/oauth/token', $this->eve_auth_configuration->getTokenUri());

        $this->assertEquals('https://login.eveonline.com/oauth/verify',
            $this->eve_auth_configuration->getVerificationTokenUri());

        $this->assertEquals('', $this->eve_auth_configuration->getClientId());

        $this->assertEquals('', $this->eve_auth_configuration->getSecretKey());

        $this->assertEquals(true, $this->eve_auth_configuration->isCertVerification());
    }

    public function testAuthHeaderEncoding()
    {
        $this->eve_auth_configuration->setClientId('CLIENT_ID');
        $this->eve_auth_configuration->setSecretKey('SECRET_KEY');

        $this->assertEquals('Q0xJRU5UX0lEOlNFQ1JFVF9LRVk=', $this->eve_auth_configuration->getAuthHeader());
    }
}
