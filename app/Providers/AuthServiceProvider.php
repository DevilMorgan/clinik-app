<?php

namespace App\Providers;

use App\Models\System\User;
use App\Models\Tenant\Autorization\Module;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        //Validation access module
        Gate::define('modules-operative', function (User $user, $slug){
            $module = Module::where('slug', 'like', $slug)->first();

            return in_array($module->slug, array_column($user->modules->toArray(), 'slug'))
                && $module->status;
        });
    }
}