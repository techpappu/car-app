<?php

namespace App\Providers;

use App\Models\Car;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
   
        /* define a admin user role */
        Gate::define('isEditor', function(User $user) {
            return $user->role === 3 || $user->role === 1;
        }); 

        Gate::define('isAdmin', function(User $user) {
            
            return $user->role === 1;
        }); 

        Gate::define('isSeller', function(User $user) {
            return $user->role === 2;
        }); 
        Gate::define('isSellerCar', function(User $user,Car $car) {
            if($car->user->isNotEmpty()){
                return $user->id===$car->user()->first()->id;
            }
            return false;
            
        }); 
    }
}
