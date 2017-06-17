<?php

namespace JellyBool\Flysystem\Upyun;

use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use JellyBool\Flysystem\Upyun\Plugins\ImagePreviewUrl;

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
                $config['password'],$config['domain'],$config['protocol']
            );

            $filesystem = new Filesystem($adapter);

            $filesystem->addPlugin(new ImagePreviewUrl());

            return $filesystem;
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
