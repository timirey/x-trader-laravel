<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Broker Connection
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the broker connections below you wish
    | to use as your default connection for trading operations. This is
    | the connection that will be used unless another connection is
    | explicitly specified during the operation.
    |
    */

    'default' => env('BROKER_CONNECTION', 'xtb'),

    /*
    |--------------------------------------------------------------------------
    | Broker Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the broker connections setup for your application.
    | You may define all of your broker credentials and environment here.
    | Currently, an example configuration for XTB is provided.
    |
    */

    'connections' => [

        'xtb' => [
            /*
            |--------------------------------------------------------------------------
            | Broker Environment
            |--------------------------------------------------------------------------
            |
            | Specify the environment for the broker connection. This determines
            | whether the connection operates in a real or demo environment.
            | Supported values: 'real', 'demo'.
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
        ],

    ],

];
