<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\Models\Subscriptions::class,
        'key' => env('pk_test_92wDBFurPkHR9bUMQeLhZXqE'),
        'secret' => env('sk_test_qAraHRakXmPIeVZwg3YmLRoI
'),
    ],

    'facebook' => [
        'client_id' => '1911052735798387',
        'client_secret' => '4c5d7d03e046853d8529cad32560ef41',
        'redirect' => 'http://localhost:8000/callback',
    ],
];
