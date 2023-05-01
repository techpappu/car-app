<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Frontend\Controller;
use App\Http\Requests\Frontend\UserRequest;
use App\Http\Service\Frontend\LoginService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use Session;
use App\Http\Service\Frontend\BodyStyleService;
use App\Http\Service\Frontend\BrandService;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $loginService;
    public $bodyStyleService;
    public $brandService;
    public function __construct(
        LoginService $loginService,
        BodyStyleService $bodyStyleService,
        BrandService $brandService
    ) {
        $this->loginService = $loginService;
        $this->bodyStyleService = $bodyStyleService;
        $this->brandService = $brandService;
    }

    public function loginView()
    {
        $bodyStyle = $this->bodyStyleService->allBodyStyle();
        $brand = $this->brandService->allBrand();
        return view('frontend.user.login', compact('bodyStyle', 'brand'));
    }
    public function registerView()
    {
        $bodyStyle = $this->bodyStyleService->allBodyStyle();
        $brand = $this->brandService->allBrand();
        return view('frontend.user.register', compact('bodyStyle', 'brand'));
    }

    public function register(UserRequest $request)
    {
        return $this->loginService->add($request);
    }

    public function postLogin(Request $request)
    {


        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials) && (auth()->user()->role) == 4) {
            return redirect()->intended('/');
        }else{
            Auth::logout();
        }

        return redirect("login");
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout()
    
    {
        // Session::flush();
        Auth::logout();
        return redirect()->intended('/');
    }

    public function userProfile()
    {
        $bodyStyle = $this->bodyStyleService->allBodyStyle();
        $brand = $this->brandService->allBrand();
        return view('frontend.user.profile', compact('bodyStyle', 'brand'));
    }

    public function profileUpdate(Request $request)
    {
        return $this->loginService->profileUpdate($request);
    }

    public function getUserContacts()
    {
        return $this->loginService->getUserContacts();
    }
}
