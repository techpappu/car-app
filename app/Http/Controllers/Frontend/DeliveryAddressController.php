<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Service\Frontend\DeliveryAddressService;
use Illuminate\Http\Request;

class DeliveryAddressController extends Controller
{
    public $deliveryAddressService;
    public function __construct(DeliveryAddressService $deliveryAddressService){
        $this->deliveryAddressService = $deliveryAddressService;
    }

    public function list()
    {
        return $this->deliveryAddressService->index();
    }
    public function add(Request $request)
    {
        return $this->deliveryAddressService->add($request);
    }

    public function show($id)
    {
        return $this->deliveryAddressService->show($id);
    }

    public function update(Request $request)
    {
        return $this->deliveryAddressService->update($request);
    }

    public function delete($id)
    {
        return $this->deliveryAddressService->delete($id);
    }

    

}
