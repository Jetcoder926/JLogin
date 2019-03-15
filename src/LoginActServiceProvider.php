<?php

namespace Jetcoder\JLogin;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Jetcoder\JLogin\Service\Jwt;
use Jetcoder\JLogin\Service\Socialite;


class LoginActServiceProvider extends LaravelServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config.php' => config_path('jlogin.php'),
        ]);
    }
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the provider.
     */
    public function register()
    {
        $this->registerServiceProviders();
    }


    public function registerServiceProviders()
    {

        $this->app->bind('token',function (){
            return new Jwt(config('jlogin'));
        });

        $this->app->bind('socialite',function (){
            return new Socialite(config('jlogin'));
        });
    }


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['jlogin','token','socialite'];
    }
}
