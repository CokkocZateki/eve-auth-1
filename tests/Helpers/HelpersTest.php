<?php
/**
 * HelpersTest.
 *
 * @category Class
 *
 * @author   Anthony Grimes <contact@anthonygrimes.co.uk>
 *
 * @link     https://github.com/aGrimes94/eve-auth
 *
 * @license MIT
 */

namespace AGrimes94\EVEAuth\Tests\Helpers;

use PHPUnit\Framework\TestCase;

/**
 * HelpersTest.
 *
 * @category Class
 *
 * @author   Anthony Grimes <contact@anthonygrimes.co.uk>
 *
 * @link     https://github.com/aGrimes94/eve-auth
 *
 * @license MIT
 */
class HelpersTest extends TestCase
{
    public function testURIConstructor()
    {
        $single_scope = [
            'esi-calendar.respond_calendar_events.v1',
        ];

        $multiple_scope = [
            'esi-calendar.respond_calendar_events.v1',
            'esi-calendar.read_calendar_events.v1',
        ];

        $uri_single_scope = eveAuthorizeURIConstruct('REDIRECT_URI', 'CLIENT_ID', $single_scope);
        $uri_multiple_scope = eveAuthorizeURIConstruct('REDIRECT_URI', 'CLIENT_ID', $multiple_scope);

        $this->assertEquals('https://login.eveonline.com/oauth/authorize?response_type=code&redirect_uri=REDIRECT_URI&client_id=CLIENT_ID&scope=esi-calendar.respond_calendar_events.v1',
            $uri_single_scope);
        $this->assertEquals('https://login.eveonline.com/oauth/authorize?response_type=code&redirect_uri=REDIRECT_URI&client_id=CLIENT_ID&scope=esi-calendar.respond_calendar_events.v1%20esi-calendar.read_calendar_events.v1',
            $uri_multiple_scope);
    }
}
