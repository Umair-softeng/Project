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
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

//    'google' => [
//        'client_id' => env('GOOGLE_CLIENT_ID'),
//        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
//        'redirect_uri' => env('GOOGLE_REDIRECT_URI'),
//        'redirect_callback' => env('GOOGLE_REDIRECT_CALLBACK'),
//        'scopes' => [
//            \Google_Service_Calendar::CALENDAR_EVENTS_READONLY,
//            \Google_Service_Calendar::CALENDAR_READONLY,
//            \Google_Service_Oauth2::OPENID,
//            \Google_Service_Oauth2::USERINFO_EMAIL,
//            \Google_Service_Oauth2::USERINFO_PROFILE,
//        ],
//        'approval_prompt' => env('GOOGLE_APPROVAL_PROMPT', 'force'),
//        'access_type' => env('GOOGLE_ACCESS_TYPE', 'offline'),
//        'include_granted_scopes' => true,
//    ],

];
