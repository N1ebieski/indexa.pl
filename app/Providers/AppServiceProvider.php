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
        $this->app->bind(\GuzzleHttp\Client::class, function ($app) {
            return new \GuzzleHttp\Client([
                'headers' => [
                    'User-Agent' => 'Grupa ALG.PL  v' . $this->app['config']->get('idir.version')
                    . ' ' . parse_url($this->app['config']->get('app.url'), PHP_URL_HOST)
                ],
                'timeout' => 20.0
            ]);
        });
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
