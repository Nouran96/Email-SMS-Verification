<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Choose verification method depending on environment variable value
        if(config('verify.verification_method') == 'EMAIL') {

            $this->app->bind('App\Verify\IService','App\Services\EmailService');

        } else if(config('verify.verification_method') == 'SMS') {

            $this->app->bind('App\Verify\IService','App\Services\TwilioService');

        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
