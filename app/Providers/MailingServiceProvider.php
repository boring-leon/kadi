<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\Mail\Config\IConfig;

class MailingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IConfig::class, config('static.mailing.config'));
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
