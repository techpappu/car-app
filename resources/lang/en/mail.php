<?php

return [
    'contact-us' => [
        'subject' => 'Contact Us',
        'dear_concern' => 'Dear ',
        'email_sending' => 'Thank you so much for contacting with use.',
    ],
    'change_email' => [
        'subject' => 'Qoffee Change Email',
        'please_click' => 'Please click the URL below for verify new email, link will be valid for '.env('URL_EXPIRES_AT').' minutes.',
    ],
    'forgot_password' => [
        'subject' => 'Qoffee Forgot Password',
        'please_click' => 'Please click the URL below for changing password, URL will be valid for '.env('URL_EXPIRES_AT').' minutes.',
    ],
    'reset_password' => [
        'subject' => 'Qoffee Reset Password',
    ],
    'admin_invitation' => [
        'please_click' => 'Please click the URL below for confirming invitation and password reset. URL will be valid for '.env('URL_EXPIRES_AT').' minutes.',
    ]
];
