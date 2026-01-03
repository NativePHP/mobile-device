<?php

namespace Native\Mobile\Providers;

use Illuminate\Support\ServiceProvider;
use Native\Mobile\Device;

class DeviceServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Device::class, function () {
            return new Device;
        });
    }
}
