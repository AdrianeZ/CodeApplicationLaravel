<?php

namespace App\Providers;

use App\Repository\CodeRepositoryImpl;
use Illuminate\Support\ServiceProvider;

class CodeRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CodeRepositoryImpl::class, CodeRepositoryImpl::class);
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
