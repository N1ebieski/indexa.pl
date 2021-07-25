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
                'timeout' => 10.0
            ]);
        });

        $this->app->bind(\N1ebieski\IDir\Models\Dir::class, function ($app) {
            return $app->make(\App\Models\Dir::class);
        });

        $this->app->bind(\N1ebieski\IDir\Http\Requests\Web\Dir\Store2Request::class, function ($app) {
            return new \App\Http\Requests\Web\Dir\Store2Request(
                $app->make(\N1ebieski\IDir\Models\BanValue::class)
            );
        });

        $this->app->bind(\N1ebieski\IDir\Http\Requests\Web\Dir\Update2Request::class, function ($app) {
            return new \App\Http\Requests\Web\Dir\Update2Request(
                $app->make(\N1ebieski\IDir\Models\BanValue::class)
            );
        });

        $this->app->bind(\N1ebieski\IDir\Http\Requests\Web\Dir\Store3Request::class, function ($app) {
            return new \App\Http\Requests\Web\Dir\Store3Request(
                $app->make(\N1ebieski\IDir\Models\BanValue::class)
            );
        });

        $this->app->bind(\N1ebieski\IDir\Http\Requests\Web\Dir\Update3Request::class, function ($app) {
            return new \App\Http\Requests\Web\Dir\Update3Request(
                $app->make(\N1ebieski\IDir\Models\BanValue::class)
            );
        });

        $this->app->bind(\N1ebieski\IDir\Http\Requests\Web\Dir\Create3Request::class, function ($app) {
            return new \App\Http\Requests\Web\Dir\Create3Request(
                $app->make(\N1ebieski\IDir\Models\BanValue::class)
            );
        });

        $this->app->bind(\N1ebieski\IDir\Http\Requests\Web\Dir\Edit3Request::class, function ($app) {
            return new \App\Http\Requests\Web\Dir\Edit3Request(
                $app->make(\N1ebieski\IDir\Models\BanValue::class)
            );
        });

        $this->app->bind(\N1ebieski\IDir\Http\Requests\Admin\Dir\Store2Request::class, function ($app) {
            return new \App\Http\Requests\Admin\Dir\Store2Request(
                $app->make(\N1ebieski\IDir\Models\BanValue::class)
            );
        });

        $this->app->bind(\N1ebieski\IDir\Http\Requests\Admin\Dir\UpdateFull2Request::class, function ($app) {
            return new \App\Http\Requests\Admin\Dir\UpdateFull2Request(
                $app->make(\N1ebieski\IDir\Models\BanValue::class)
            );
        });

        $this->app->bind(\N1ebieski\IDir\Http\Requests\Admin\Dir\Store3Request::class, function ($app) {
            return new \App\Http\Requests\Admin\Dir\Store3Request(
                $app->make(\N1ebieski\IDir\Models\BanValue::class)
            );
        });

        $this->app->bind(\N1ebieski\IDir\Http\Requests\Admin\Dir\UpdateFull3Request::class, function ($app) {
            return new \App\Http\Requests\Admin\Dir\UpdateFull3Request(
                $app->make(\N1ebieski\IDir\Models\BanValue::class)
            );
        });

        $this->app->bind(\N1ebieski\IDir\Http\Requests\Admin\Dir\Create3Request::class, function ($app) {
            return new \App\Http\Requests\Admin\Dir\Create3Request(
                $app->make(\N1ebieski\IDir\Models\BanValue::class)
            );
        });

        $this->app->bind(\N1ebieski\IDir\Http\Requests\Admin\Dir\EditFull3Request::class, function ($app) {
            return new \App\Http\Requests\Admin\Dir\EditFull3Request(
                $app->make(\N1ebieski\IDir\Models\BanValue::class)
            );
        });

        $this->app->bind(\N1ebieski\IDir\Http\Requests\Admin\Dir\UpdateRequest::class, function ($app) {
            return new \App\Http\Requests\Admin\Dir\UpdateRequest(
                $app->make(\N1ebieski\IDir\Models\BanValue::class)
            );
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
