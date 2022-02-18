<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Broadcaster
    |--------------------------------------------------------------------------
    |
    | This option controls the default broadcaster that will be used by the
    | framework when an event needs to be broadcast. You may set this to
    | any of the connections defined in the "connections" array below.
    |
    | Supported: "pusher", "redis", "log", "null"
    |
    */

    'default' => env('BROADCAST_DRIVER', 'pusher'),

    /*
    |--------------------------------------------------------------------------
    | Broadcast Connections
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the broadcast connections that will be used
    | to broadcast events to other systems or over websockets. Samples of
    | each available type of connection are provided inside this array.
    |
    */

    'connections' => [

        'pusher' => [
            'driver' => 'pusher',
            'key' => env('PUSHER_APP_KEY','5ae06d2fb7e27eb4a1d8'),
            'secret' => env('PUSHER_APP_SECRET','2c88af3f8a9e5eecb3f0'),
            'app_id' => env('PUSHER_APP_ID','1278649'),
            'options' => [
                'cluster' => env('PUSHER_APP_CLUSTER','ap3'),
                'encrypted' => true,
                // 'host' => env('PUSHER_HOST','pusher.com'),
                // 'useTLS'    => false,
                // 'port' => 6001,
                // 'scheme' => env('PUSHER_SCHEME','http'),
                // 'curl_options' => [
                //     CURLOPT_SSL_VERIFYHOST => 0,
                //     CURLOPT_SSL_VERIFYPEER => 0,
                // ],
            ],
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
        ],

        'log' => [
            'driver' => 'log',
        ],

        'null' => [
            'driver' => 'null',
        ],

    ],

];
