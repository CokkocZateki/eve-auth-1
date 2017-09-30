<?php
/**
 * Helpers
 *
 * @category function
 *
 * @author   Anthony Grimes <contact@anthonygrimes.co.uk>
 *
 * @link     https://github.com/aGrimes94/eve-auth
 *
 * @license MIT
 */

use GuzzleHttp\Psr7\Uri;

// TODO There must be a better way of doing this
if (!function_exists('eveAuthorizeURIConstruct')) {
    /**
     * Construct a authorize uri
     *
     * @param string $redirect_uri
     * @param string $client_id
     * @param array $scopes
     *
     * @return string
     */
    function eveAuthorizeURIConstruct(string $redirect_uri = '', $client_id = '', array $scopes = [])
    {
        $scope_string = '';

        $scope_counter = 0;

        foreach ($scopes as $scope) {

            if ($scope_counter >= 1) {
                $scope_string .= ' ' . $scope;
            } else {
                $scope_string .= $scope;
            }

            $scope_counter++;
        }

        $query_params = [
            'response_type' => 'code',
            'redirect_uri' => $redirect_uri,
            'client_id' => $client_id,
            'scope' => $scope_string,
        ];


        return (string)Uri::fromParts([
            'scheme' => 'https',
            'host' => 'login.eveonline.com',
            'path' => rtrim('/oauth/authorize/', '/'),
            'query' => \GuzzleHttp\Psr7\build_query($query_params),
        ]);
    }
}