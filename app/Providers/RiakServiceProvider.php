<?php

namespace LaravelDemo\Providers;

use Riak\Connection;
use Illuminate\Support\ServiceProvider;

class RiakServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen('SomeEvent','SomeEventHandler');
    }

    /**
     * Register the application service s.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton('Riak\Contract\Connection', function($app)
        {
          return new Connection(config('riak'));

        });
    }
}
