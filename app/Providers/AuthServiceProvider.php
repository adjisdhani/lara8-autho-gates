<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

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

        Gate::define('view-book', function (User $user) {
            // Semua user bisa melihat data buku
            return true;
            // return $user->id === 2;
        });

        Gate::define('manage-book', function (User $user) {
            // Hanya user dengan ID 2 yang bisa mengelola data buku
            return $user->id === 2;
        });
    }
}
