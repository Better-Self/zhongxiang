<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\AdminPermission;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
	{
	     $this->registerPolicies();

	    if(\request()->getPathInfo("pathInfo")=="/admin"){
            foreach (\App\Permission::all() as $permission) {
                Gate::define($permission['name'], function ($user) use ($permission) {
                    return in_array($user['role_id'], array_column($permission->Role->toArray(), 'id'));
                });
            }
        }

	}
}
