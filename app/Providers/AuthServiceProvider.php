<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        Gate::define('admin-access', function($user){
            return $user->role->name == 'administrator';
        });

        Gate::define('author-access', function($user){
            return $user->role->name == 'author';
        });

        Gate::define('editor-access', function($user){
            return $user->role->name == 'editor';
        });

        Gate::define('contributor-access', function($user){
            return $user->role->name == 'contributor';
        });
    }
}