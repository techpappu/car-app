<?php

namespace App\Http\Controllers;

use App\Http\Service\ContactUsService;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public $contactUsService;
    public function __construct(ContactUsService $contactUsService) {
        $this->middleware('auth');
        $this->contactUsService = $contactUsService;
    }
    public function index()
    {
        $data = $this->contactUsService->index();
        return view('car.contact_us', compact('data'));
    }

    public function fetchbyPage()
    {
        $data = $this->contactUsService->index();
        return view('car.contact_us_pagination_data', compact('data'))->render();
    }

    public function delete($id)
    {
        return $this->contactUsService->delete($id);
    }

    public function replayMail(Request $request)
    {
        return $this->contactUsService->replayMail($request);
    }

    public function inquiry()
    {
        $data = $this->contactUsService->inquiry();
        return view('car.inquiry', compact('data'));
    }

    public function inquiryFetchbyPage()
    {
        $data = $this->contactUsService->inquiry();
        return view('car.inquiry_pagination_data', compact('data'))->render();
    }
}
