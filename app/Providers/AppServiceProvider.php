<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin', function(User $user){
            return $user->role->role === 'Admin';
        });
        Gate::define('manager', function(User $user){
            return $user->role->role === 'Manager';
        });
        Gate::define('member', function(User $user){
            return $user->role->role === 'Member';
        });
        Gate::define('adminORmanager', function(User $user){
            if($user->role->role === 'Manager'OR $user->role->role ==='Admin')
            {return true;}
        });
        Gate::define('adminOrassignee', function(User $user, $projectId){
            if($user->projects->find($projectId) OR $user->role->role ==='Admin'){
                return true;
            }
                
        });
    }
}
