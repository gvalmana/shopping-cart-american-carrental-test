<?php

namespace App\Providers;

use App\Services\implementations\ProductsJsonServiceImpl;
use App\Services\implementations\ProductsServiceImpl;
use App\Services\IProductsService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        App::singleton(IProductsService::class, ProductsJsonServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
