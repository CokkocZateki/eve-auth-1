<h1 align="center">
EVE-Auth
</h1>

<p align="center">
<a href="https://packagist.org/packages/aGrimes94/eve-auth"><img src="https://poser.pugx.org/agrimes94/eve-auth/v/stable?format=flat-square" alt="Latest Stable Version"></a>
<a href="https://styleci.io/repos/105326896"><img src="https://styleci.io/repos/105326896/shield?branch=master" alt="StyleCI Status"></a>
<a href="https://travis-ci.org/aGrimes94/eve-auth"><img src="https://img.shields.io/travis/aGrimes94/eve-auth.svg?style=flat-square" alt="Travis Build Status"></a>
<a href="https://www.codacy.com/"><img src="https://img.shields.io/codacy/grade/b80c9dd435044db7ad028bcf7e46e6af.svg?style=flat-square" alt="Codacy Grade"></a>
<a href="https://codeclimate.com/github/aGrimes94/eve-auth"><img src="https://img.shields.io/codeclimate/github/aGrimes94/eve-auth.svg?style=flat-square" alt="Codeclimate Rating"></a>
<a href="https://codeclimate.com/github/aGrimes94/eve-auth/coverage"><img src="https://img.shields.io/codeclimate/coverage/github/aGrimes94/eve-auth.svg?style=flat-square" alt="Codeclimate Coverage"></a>
</p>

EVE-Auth is a simple package to allow you to quickly request and verify tokens received during the OAuth2 lifecycle when interacting with the EVE Online SSO.

## Requirements

PHP 7.1 and later

## Installation

### Composer

``` sh
composer require agrimes94/eve-auth
```

## Getting Started

EVE-Auth exposes a simple and expressive api for you to interact with.

A complete list of API documentation is in the works and is expected soon.

To get started you'll have to create an EVE-Auth instance:

``` php
$eve_auth_client = new AGrimes94\EVEAuth\EVEAuth();
```

You may optionally pass in a configuration into the constructor if you do not wish to use the provided setter methods in EVE-Auth as demonstrated below:

``` php
$eve_auth_configuration = new AGrimes94\EVEAuth\EVEAuthConfiguration();

$eve_auth_configuration->setClientId('YOUR_CLIENT_ID');
$eve_auth_configuration->setSecretKey('YOUR_SECRECT_KEY');

$eve_auth_client = AGrimes94\EVEAuth\EVEAuth($eve_auth_configuration);
```

Below are examples of requesting an access token, verifying the token and getting a refresh token using the in-line setter methods:

### Requesting an access token

``` php
$request = $eve_auth_client->setClientId('YOUR_CLIENT_ID')
        ->setSecretKey('YOUR_SECRECT_KEY')
        ->requestToken();
```

You may use the getters methods on the returned response like so:

``` php
$request->getAccessToken();
$request->getTokenType();
$request->getExpiresIn();
$request->getRefreshToken();
```

### Verifying a request

``` php
$request = $eve_auth_client->verifyToken('YOUR_ACCESS_TOKEN');
```

You may use the getters methods on the returned response like so:

``` php
$request->getCharacterId();
$request->getExpiresOn();
$request->getScopes();
$request->getTokenType();
$request->getCharacterOwnerHash();
```

### Requesting a new refresh token

``` php
$request = $eve_auth_client->refreshToken('YOUR_ACCESS_TOKEN');
```

You may use the getters methods on the returned response like so:

``` php
$request->getAccessToken();
$request->getTokenType();
$request->getExpiresIn();
$request->getRefreshToken();
```

### URI Helper

EVE-Auth provides a helper method for constructing your authorize uri's:

e.g. *https://login.eveonline.com/oauth/authorize?response_type=code&redirect_uri=YOUR_REDIRECT_URI&client_id=YOUR_CLIENT_ID&scope=YOUR_SCOPES*

This helper can be called anywhere without creating an EVE-Auth instance:

``` php
$scope = [
        'esi-calendar.respond_calendar_events.v1',
        'esi-calendar.read_calendar_events.v1',
    ]
    
$uri = eveAuthorizeURIConstruct('YOUR_REDIRECT_URI', 'YOUR_CLIENT_ID', $scope);
```

## Contributing

Thank you for considering contributing to EVE-Auth! Please refer to the `CONTRIBUTING.md` for a full guideline on how to contribute.

## Security Vulnerabilities

If you find a security vulnerability, do NOT open an issue. Email [contact@anthonygrimes.co.uk](mailto:contact@anthonygrimes.co.uk) instead. All security vulnerabilities will be promptly addressed.

## License

EVE-Auth is open-sourced software licensed under the [MIT License](https://opensource.org/licenses/MIT).
