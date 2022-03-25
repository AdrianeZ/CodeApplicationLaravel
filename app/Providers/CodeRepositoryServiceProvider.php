<?php

namespace App\Providers;

use App\Repository\CodeRepository;
use App\Repository\CodeRepositoryInterface;
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
        $this->app->singleton(CodeRepositoryInterface::class, CodeRepository::class);
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
