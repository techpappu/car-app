<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class expenseController extends Controller
{
    use RespondsWithHttpStatus;

    function index($id)
    {   $data=[];
        $data['carData'] =\Facades\App\Models\Car::find($id);
        $data['expense']=$data['carData']->expense;
        return view('car.car_expense_data', compact('data'))->render();
    }
    function create(Request $request)
    {   
        $carData=\Facades\App\Models\Car::find($request->carId);
        $data=$request->only('type','comment','amount');
        $carData->expense()->create($data);
        return $this->success(trans('messages.add'), Response::HTTP_CREATED);
    }

    function delete($id)
    {
        $expenseData =\Facades\App\Models\Expense::find($id);

        return $this->success($expenseData->delete());

    }
}
