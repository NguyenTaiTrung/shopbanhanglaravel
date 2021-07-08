<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],
    'facebook' => [
        'client_id' => '1018009075395907',  //client face của bạn
        'client_secret' => 'a256c3ef56cf133adc233ea5d993b77d',  //client app service face của bạn
        'redirect' => 'http://localhost/shopbanhang/admin/callback' //callback trả về
    ],

    'google' => [
        'client_id' => '879164425796-26js6t9itgjot01cpa2mu8amd840crcj.apps.googleusercontent.com',
        'client_secret' => 'bI8EbWJsTXXFJOD8jqHP1c02',
        'redirect' => 'http://localhost/shopbanhang/google/callback'
    ],



];
