<?php

namespace JellyBool\Flysystem\Upyun;

use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class UpyunServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Storage::extend('upyun', function ($app, $config) {
            $adapter = new UpyunAdapter(
                $config['bucket'], $config['operator'],
                $config['password'],$config['domain']
            );
            return new Filesystem($adapter);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
