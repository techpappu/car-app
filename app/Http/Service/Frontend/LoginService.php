<?php

namespace App\Http\Service\Frontend;

use App\Http\Repository\Frontend\LoginRepository;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;

class LoginService
{
    use RespondsWithHttpStatus;

    public function add($request)
    {

        $user = LoginRepository::store($request);
        if ($user) {
            return $this->success(trans('messages.add'), Response::HTTP_CREATED);
        }
    }

    public function profileUpdate($request)
    {
        if ($request->newEmail) {
            if (!$request->currentPasswordInEmail) {
                return $this->failure(trans("messages.password"), Response::HTTP_BAD_REQUEST);
            }
            $currentPassCheck = LoginRepository::currentPasswordCheckInEmail($request);
            if (!$currentPassCheck) {
                return $this->failure(trans("messages.currentPassword"), Response::HTTP_BAD_REQUEST);
            }
        }
        if ($request->newPassword) {
            if (!$request->currentPassword) {
                return $this->failure(trans("messages.password"), Response::HTTP_BAD_REQUEST);
            }

            if($request->newPassword != $request->confirmPassword){
                return $this->failure(trans("messages.confirmPassword"), Response::HTTP_BAD_REQUEST);
            }

           
            $currentPasswordCheck = LoginRepository::currentPassCheckInChangePassowrd($request);
            if (!$currentPasswordCheck) {
                return $this->failure(trans("messages.currentPassword"), Response::HTTP_BAD_REQUEST);
            }
        }
        


      
        $user = LoginRepository::profileUpdate($request);
        if ($user) {
            return $this->success(trans('messages.update'), Response::HTTP_CREATED);
        }
    }

    public function getUserContacts()
    {
        return LoginRepository::getUserContacts();
    }
}
