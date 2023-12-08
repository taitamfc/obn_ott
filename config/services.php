<?php



return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => '922163426197125',
        'client_secret' => 'b43776fa2abb744743bfb82bb65391e4',
        'redirect' => "/facebook/callback",
    ],  
    'google' => [
        'client_id' => '654852381692-tt5chnust7llima3sbo8croj0au190ti.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => "/google/callback",
    ], 
];