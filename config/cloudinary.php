<?php

return [

    'cloud' => [
        'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
        'api_key'    => env('CLOUDINARY_API_KEY'),
        'api_secret' => env('CLOUDINARY_API_SECRET'),
    ],

    'url' => [
        'secure' => true
    ],

    'upload_preset'      => env('CLOUDINARY_UPLOAD_PRESET'),
    'notification_url'   => env('CLOUDINARY_NOTIFICATION_URL'),
    'upload_route'       => env('CLOUDINARY_UPLOAD_ROUTE'),
    'upload_action'      => env('CLOUDINARY_UPLOAD_ACTION'),
];
