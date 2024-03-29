<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }

    protected function gate()
    {
        $this->registerPolicies();

        Gate::define('create-post', function($user) {
            return $user->isAdmin();
        });

        Gate::define('update-post', function($user, $post) {
            return $user->isAdmin() || $user->id === $post->user_id;
        });

        Gate::define('delete-post', function($user, $post) {
            return $user->isAdmin() || $user->id === $post->user_id;
        });
    }
}
