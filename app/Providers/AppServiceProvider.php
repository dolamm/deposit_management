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
        if(! $this->app->runningInConsole()){
            Gate::define('admin', function ($user){
                return $user->role_id == User::ROLE_ADMIN;
            });
            Gate::define('officer', function ($user){
                return $user->role_id == User::ROLE_OFFICER;
            });
            Gate::define('admin-officer', function ($user){
                return $user->role_id == User::ROLE_ADMIN || $user->role_id == User::ROLE_OFFICER;
            });
            // Auth::user()->id = $id
            Gate::define('is_auth_user', function ($user, $id){
                return $user->id == $id;
            });
            //quyen xem man hinh & quyen thao tac
            foreach (Permission::all() as $permission) {
                Gate::define($permission->name, function (User $user) use ($permission) {
                    return $user->hasPermission($permission->name) || $user->hasPermission(Role::master_permission);
                });
            }
        }
    }
}
