<?php
namespace App\Http\Controllers\Frontend;

use Socialite;
use Exception;
use Redirect;
use App\Http\Service\Frontend\SocialAccountService;
class GoogleController extends Controller
{
    public $socialAccountService;
    public function __construct(SocialAccountService $socialAccountService)
    {
        $this->socialAccountService = $socialAccountService;
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        try {
           /*  $providerUser = Socialite::driver('google')->user();           
            $create['name'] = $providerUser->getName();
            $create['email'] = $providerUser->getEmail();
            $create['provider_id'] = $providerUser->getId();
            $create['provider_type'] = 2;
            $create['role'] = 4;
            $userModel = new User;
            $createdUser = $userModel->addNew($create);
            Auth::loginUsingId($createdUser->id); */
            $user = $this->socialAccountService->createOrGetUser(Socialite::driver('google')->user(), "google");
            auth()->login($user);
            return Redirect::to('/');
        } catch (Exception $e) {           
            return redirect('auth/google');
        }
    }
}
