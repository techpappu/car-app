<?php

return [

    'pagination_records' => 20,
    'admin_role' => 2,
    'user_role' => 1,
    'failed_common_message' => 'Operation Failed',
    'token_bit_number' => 32,
    'expires_in_time_multiplier' => 60,
    'image_download_path' => env('SWAGGER_LUME_CONST_HOST') . '/image/',
    'image_store_path' => '',
    'langs' => [
        'english' => 'en',
        'japanese' => 'jp'
    ],
    'pagination_records_pickup_setting_list' => 20,
    'pagination_records_review_list' => 20,
    'ttl_minutes' => 1,
    'image_base_url' => 'http://localhost:8000',
    'profile_image_base_url' => 'http://localhost:8000',
    'image_file_path' => env('FILE_PATH'),
    'image_file_path_review' => 'upload/review/',
    'image_order_doc' => 'upload/order-doc/',
    'currencySymbool' => "$",
];

