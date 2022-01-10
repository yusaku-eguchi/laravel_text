<?php

namespace App\Providers;

use App\Foundation\Auth\UserTokenProvider;
use App\DataProvider\UserToken;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        $this->app->make('auth')->provider(
            'user_token',
            function (Application $app, array $config) {
                return new UserTokenProvider(new UserToken($app->make('db')));
            }
        );
    }
}
