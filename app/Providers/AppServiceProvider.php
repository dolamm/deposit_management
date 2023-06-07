<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Auth;
use App\Models\Permission;
use App\Models\RolePermission;
use App\Models\Role;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        Gate::define('check-role-admin', function ($user){
            return $user->role_id == User::ROLE_ADMIN;
        });
        if(! $this->app->runningInConsole()){
            foreach (Permission::all() as $permission) {
                Gate::define($permission->name, function (User $user) use ($permission) {
                    return $user->hasPermission($permission->name);
                });
            }
        }
    }
}
