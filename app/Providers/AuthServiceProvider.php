<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function($user) {
            return $user->isAdmin();
        });
        Gate::after(function($user) {
            return $user->isGuess();
        });

        Gate::define('edit-settings', function($user) {
            return $user->isAdmin() ? Response::allow() : Response::deny('You must be a super administrator.');
        });

        Gate::define('update-post', function($user, $post) {
            return $user->id === $post->user_id ? Response::allow() : Response::deny('sorry, maybe you can call admin ?');
        });

        Gate::define('delete-post', function($user, $post) {
            return $user->id === $post->user_id;
        });

        Gate::define('create-post', function($user, $post, $isCreate) {
            return $user->id === $post->user_id && $isCreate;
        });
        // Gate::define('update-post', 'App\Policies\PostPolicy@update');
    }
}
