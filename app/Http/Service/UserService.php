<?php

namespace App\Http\Service;

use App\Http\Repository\UserRepository;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;
use App\Http\Resources\UserResource;

class UserService
{
    use RespondsWithHttpStatus;

    public function index($request)
    {
        return UserResource::collection(UserRepository::index($request));
    }

    public function add($request)
    {
        $user = UserRepository::store($request);
        if ($user) {
            return $this->success(trans('messages.add'), Response::HTTP_CREATED);
        }
    }

    public function show($id)
    {
        $user = UserRepository::findById($id);
        if (!$user) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }

        return new UserResource($user);
    }

    public function update($request)
    {
        $user = UserRepository::findById($request->id);
        if (!$user) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }
        $isUpdated = UserRepository::update($user, $request);
        if ($isUpdated) {
            return $this->success(trans('messages.update'), Response::HTTP_OK);
        }
    }

    public function delete($id)
    {
        $user = UserRepository::findById($id);
        if (!$user) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }
        return $this->success(UserRepository::delete($user));
    }
}
