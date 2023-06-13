<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;

use App\Models\Objeto;
use App\Policies\ObjetoPolicy;

use App\Models\Agradecimiento;
use App\Policies\AgradecimientoPolicy;

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
        User::class => UserPolicy::class,
        Objeto::class => ObjetoPolicy::class,
        Agradecimiento::class => AgradecimientoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Implicitly grant "Super-Admin" role all permission checks using can()
        Gate::before(function ($user, $ability) {
            if ($user->hasRole('Capitan')) {
                return true;
            }
        });
    }
}
