<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Service\UserService;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
class AdminController extends Controller
{

    public $userService;
    public function __construct(UserService $userService)
    {
        $this->middleware('auth');
        $this->userService = $userService;
    }
    public function index(Request $request)
    {
        $request->role = 1;
        $data = $this->userService->index($request);
        return view('admin.admin', compact('data'));
    }
    public function fetchbyPage(Request $request)
    {
        if ($request->ajax()) {
            $request->role = 1;
            $data = $this->userService->index($request);
            return view('admin.pagination_data', compact('data'))->render();
        }
    }

    public function add(UserRequest $request)
    {
        return $this->userService->add($request);
    }
    public function show($id)
    {
        return $this->userService->show($id);
    }

    public function update(UserUpdateRequest $request)
    {
        return $this->userService->update($request);
    }

    public function delete($id)
    {
        return $this->userService->delete($id);
    }

    public function editorList(Request $request)
    {
        $request->role = 3;
        $data = $this->userService->index($request);
        return view('admin.editor', compact('data'));
    }
    public function sellerList(Request $request)
    {
        $request->role = 2;
        $data = $this->userService->index($request);
        return view('admin.seller', compact('data'));
    }
    public function sellerFetchbyPage(Request $request)
    {
        if ($request->ajax()) {
            $request->role = 2;
            $data = $this->userService->index($request);
            return view('admin.seller_data', compact('data'))->render();
        }
    }

    public function editorFetchbyPage(Request $request)
    {
        if ($request->ajax()) {
            $request->role = 3;
            $data = $this->userService->index($request);
            return view('admin.pagination_data', compact('data'))->render();
        }
    }

    public function customerList(Request $request)
    {
        $request->role = 4;
        $data = $this->userService->index($request);
        return view('admin.customer', compact('data'));
    }

    public function customerFetchbyPage(Request $request)
    {
        if ($request->ajax()) {
            $request->role = 4;
            $data = $this->userService->index($request);
            return view('admin.pagination_data', compact('data'))->render();
        }
    }
}
