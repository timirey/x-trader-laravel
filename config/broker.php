<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Broker Configuration
    |--------------------------------------------------------------------------
    |
    | This configuration handles the settings for the single broker connection
    | in your application. It includes the environment, service class, and
    | credentials required for connecting to the broker's API.
    |
    */

    'environment' => env('BROKER_ENVIRONMENT', 'demo'),

    /*
    |--------------------------------------------------------------------------
    | Broker Credentials
    |--------------------------------------------------------------------------
    |
    | Here you may provide the credentials for the broker connection,
    | including the user ID and password.
    |
    */

    'user_id' => env('BROKER_USER_ID'),
    'password' => env('BROKER_PASSWORD'),
];
