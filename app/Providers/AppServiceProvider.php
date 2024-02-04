<?php

namespace App\Providers;

use App\Repositories\products\IProductsRepository;
use App\Repositories\products\ProductsRepository;
use App\Services\shopping\implementations\ProductsJsonServiceImpl;
use App\Services\shopping\implementations\ProductsServiceImpl;
use App\Services\shopping\IProductsService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        App::singleton(IProductsService::class, ProductsServiceImpl::class);
        App::bind(IProductsRepository::class, ProductsRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
