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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT_URI'),
    ],

    'stripe' => [
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
        'lifetime_price_id' => env('STRIPE_LIFETIME_PRICE_ID', 'price_1Qwr2MP3Jpvf2dux5YrFn62O'),
    ],
    
    'smartid' => [
        'relying_party_uuid' => env('SMART_ID_RP_UUID', '00000000-0000-0000-0000-000000000000'),
        'relying_party_name' => env('SMART_ID_RP_NAME', 'DEMO'),
        'host_url' => env('SMART_ID_HOST_URL', 'https://sid.demo.sk.ee/smart-id-rp/v2/'),
        'certificate_level' => env('SMART_ID_CERT_LEVEL', 'QUALIFIED'),
        'public_ssl_keys' => env('SMART_ID_PUBLIC_SSL_KEYS', 'sha256//Ps1Im3KeB0Q4AlR+/J9KFd/MOznaARdwo4gURPCLaVA='),
        'trusted_certificates_path' => resource_path(), // resource_path('trusted_certificates'),
        'poll_interval' => env('SMART_ID_POLL_INTERVAL', 5),
        'max_poll_attempts' => env('SMART_ID_MAX_POLL_ATTEMPTS', 24),
    ],
];
