<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Service\Frontend\SocialAccountService;
use Exception;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{

    public $socialAccountService;
    public function __construct(SocialAccountService $socialAccountService)
    {
        $this->socialAccountService = $socialAccountService;
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $user = $this->socialAccountService->createOrGetUser(Socialite::driver('facebook')->user(), "facebook");
            auth()->login($user);
            return Redirect::to('/');
        } catch (Exception $e) {
            return redirect('auth/facebook');
        }
    }
}
