<?php

namespace App\Providers;

use App\Utils\AppProviderMap;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = AppProviderMap::PROVIDERS;
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation) {
            $this->app->singleton($interface, $implementation);
        }
    }
}
