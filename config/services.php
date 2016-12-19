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
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
    'client_id' => '221731574937677',
    'client_secret' => '05f4e8ea9b79dc4075e90700bb5e3769',
    'redirect' => 'http://localhost:8000/facebookcallback',
],

'twitter' => [
    'client_id' => 'T89zCkPRDydJlkqIbqeEMGtJl',
    'client_secret' => 'orr2rDpVT1fI4v9u92e5uLWrOM6iGPv6LX6d1TT1bMHRZ1X48F',
    'redirect' => 'http://localhost:8000/twittercallback',
],

'google' => [
    'client_id' => '1009816866927-e0l99lptbhilvi71699mvdmduvqcq2s4.apps.googleusercontent.com',
    'client_secret' => '-mzFDsLgMmdHyNKuUcA3VrQR',
    'redirect' => 'http://localhost:8000/googlecallback',
],

'linkedin' => [
    'client_id' => '77ymyfwk0javg5',
    'client_secret' => 'PTK2hTUd5uQEMgyn',
    'redirect' => 'http://localhost:8000/linkedincallback',
],

];
