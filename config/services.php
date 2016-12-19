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
    'redirect' => 'https://tutorago.com/facebookcallback',
],

'twitter' => [
    'client_id' => 'MrgZk0zUoyILG6RM8uQErjh8d',
    'client_secret' => 'ZTpTls8rv86NqmBh5dxqi9WU3gnatKnXC1vt2sa065QHKoPIOH',
    'redirect' => 'https://tutorago.com/twittercallback',
],

'google' => [
    'client_id' => '384956652739-btbm92fapuf4719avho4qhsgv3sihgg8.apps.googleusercontent.com',
    'client_secret' => '9xG5HFT6ybjb7b_bklTlQOC7',
    'redirect' => 'https://tutorago.com/googlecallback',
],

'linkedin' => [
    'client_id' => '773ui7uj5rpshp',
    'client_secret' => 'xlVloAp34jlC7ZyY',
    'redirect' => 'https://tutorago.com/linkedincallback',
],

];
