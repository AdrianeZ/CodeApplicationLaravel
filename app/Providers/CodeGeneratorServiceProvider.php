<?php

namespace App\Providers;

use App\Services\CodeGenerator;
use App\Services\CodeGeneratorImpl;
use Illuminate\Support\ServiceProvider;

class CodeGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(CodeGenerator::class, CodeGeneratorImpl::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
