<?php

namespace App\Http\Service\Frontend;

use App\Models\SocialAccount;
use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Models\User;

class SocialAccountService
{

    public function createOrGetUser(ProviderUser $providerUser, $provider)
    {
        $account = SocialAccount::whereProvider($provider)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $provider
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'role' => 4
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}
