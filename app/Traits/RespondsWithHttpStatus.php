<?php
namespace App\Traits;

use Illuminate\Support\Str;
use stdClass;

trait RespondsWithHttpStatus
{
    protected function success($data = [], $status = 200)
    {
        return response([          
            'code' => $status,
            'hasError' => false,
            'result' => (is_array($data) || is_object($data)) ? $data : ['status' => is_numeric($data) ? true : $data],
        ], $status);
    }

    protected function failure($errors = [], $status = 422)
    {
        $message = (!is_array($errors) && !is_object($errors)) ? $errors : config('constant.failed_common_message');
        $errors = (is_array($errors) || is_object($errors)) ? $errors : null;

        return response([
            'code' => $status,
            'hasError' => true,
             'message' => $message,
            'errors' => is_null($errors) ? new stdClass : $errors,
        ], $status);
    }

}
