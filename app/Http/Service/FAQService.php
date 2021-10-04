<?php

namespace App\Http\Service;

use App\Http\Repository\FAQRepository;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;
use App\Http\Resources\FAQResource;

class FAQService
{
    use RespondsWithHttpStatus;

    public function index()
    {
        return FAQResource::collection(FAQRepository::index());
    }

    public function add($request)
    {
        $faq = FAQRepository::store($request);
        if ($faq) {
            return $this->success(trans('messages.add'), Response::HTTP_CREATED);
        }
    }

    public function show($id)
    {
        $faq = FAQRepository::findById($id);
        if (!$faq) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }

        return new FAQResource($faq);
    }

    public function update($request)
    {
        $faq = FAQRepository::findById($request->id);
        if (!$faq) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }
        $isUpdated = FAQRepository::update($faq, $request);
        if ($isUpdated) {
            return $this->success(trans('messages.update'), Response::HTTP_OK);
        }
    }

    public function delete($id)
    {
        $faq = FAQRepository::findById($id);
        if (!$faq) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }
        return $this->success(FAQRepository::delete($faq));
    }
}
