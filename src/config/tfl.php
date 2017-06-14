<?php

return [

    /*
    |--------------------------------------------------------------------------
    | TFL Credentials
    |--------------------------------------------------------------------------
    |
    | APP ID & API Key for accessing unified API without traffic limits.
    */

    'app_id' => env('TFL_API_ID', null),

    'app_key' => env('TFL_API_KEY', null),

    /*
    |--------------------------------------------------------------------------
    | TFL Connection details
    |--------------------------------------------------------------------------
    |
    | Override host & connection values
    */

    'host_uri' => env('TFL_HOST_URI', 'https://api.tfl.gov.uk'),

    'timeout' => env('TFL_TIMEOUT', 0),

    'connect_timeout' => env('TFL_CONNECT_TIMEOUT', 0),

    'user_agent' => env('TFL_USER_AGENT', 'Swagger-Tfl/1.0.0/php'),

    /*
    |--------------------------------------------------------------------------
    | Optional proxy info
    |--------------------------------------------------------------------------
    |
    | Set proxy_host to proxy uri, & proxy_type to CURLPROXY_HTTP or CURLPROXY_SOCKS5
    */

    'proxy_host' => env('TFL_PROXY_HOST', null),

    'proxy_type' => env('TFL_PROXY_TYPE', null),

    'proxy_port' => env('TFL_PROXY_PORT', null),

    'proxy_user' => env('TFL_PROXY_USER', null),

    'proxy_password' => env('TFL_PROXY_PASSWORD', null),

    /*
    |--------------------------------------------------------------------------
    | Debug options
    |--------------------------------------------------------------------------
    |
    | Debug info written to stdout by default.
    */

    'debug' => env('TFL_DEBUG', false),

    'debug_file' => env('TFL_DEBUG_FILE', 'php://output'),

];
