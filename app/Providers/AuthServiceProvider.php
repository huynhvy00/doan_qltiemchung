<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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
        Gate::define('admin-position', function($user){
            if($user->idLoaiNV === 3){
                return true;
            }else{
                return false;
            }
        });
        Gate::define('yte-position', function($user){
            if($user->idLoaiNV === 1){
                return true;
            }else{
                return false;
            }
        });
        Gate::define('trungtam-position', function($user){
            if($user->idLoaiNV === 2){
                return true;
            }else{
                return false;
            }
        });
        Gate::define('admin-non-position', function($user){
            if($user->idLoaiNV === 3){
                return false;
            }else{
                return true;
            }
        });
        Gate::define('yte-position', function($user){
            if($user->idLoaiNV === 1){
                return false;
            }else{
                return true;
            }
        });
        Gate::define('trungtam-position', function($user){
            if($user->idLoaiNV === 2){
                return false;
            }else{
                return true;
            }
        });
    }
}
