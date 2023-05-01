<?php

namespace App\Http\Service;

use App\Http\Repository\StripePaymentRepository;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;
use App\Http\Repository\FileRepository;

class StripePaymentService
{
    use RespondsWithHttpStatus;

    public function userOrderList()
    {
        return StripePaymentRepository::userOrderList();
    }

    public function orderStatusUpdate($request)
    {
        $order = StripePaymentRepository::findById($request->id);

        if (!$order) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }

        $isUpdated = StripePaymentRepository::update($order, $request);
        if ($isUpdated) {
            return $this->success(trans('messages.update'), Response::HTTP_OK);
        }
    }

    public function getOrderById($id)
    {
        return StripePaymentRepository::getOrderById($id);
    }

    public function orderAdminInfo($id)
    {
        $orderAdminInfos = StripePaymentRepository::orderAdminInfo($id);
        $file = FileRepository::getFileById($id);
        $orderAdminInfos['documents'] = $file;
        return $orderAdminInfos;
    }

    public function orderUpdate($request)
    {
        $order = StripePaymentRepository::findById($request->id);

        if (!$order) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }

        $isUpdated = StripePaymentRepository::orderInfoUpdate($order, $request);
        if ($isUpdated) {
            return $this->success(trans('messages.update'), Response::HTTP_OK);
        }
    }

    public function orderAttachedCertificate($request)
    {
        $order = StripePaymentRepository::findById($request->order_id);

        if (!$order) {
            return $this->failure(trans("messages.notFound"), Response::HTTP_NOT_FOUND);
        }

        $isUpdated = StripePaymentRepository::orderAttachedCertificate($order, $request);
        if ($isUpdated) {
            return $this->success(trans('messages.update'), Response::HTTP_OK);
        }
    }
}
