<?php

namespace App\Providers;

use App\Repositories\shopping\IProductsRepository;
use App\Repositories\shopping\ProductsRepository;
use App\Services\shopping\implementations\ProductsJsonServiceImpl;
use App\Services\shopping\implementations\ProductsServiceImpl;
use App\Services\shopping\IProductsService;
use App\UseCases\shopping\CarSummaryCase;
use App\UseCases\shopping\ICarSummaryCase;
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
        App::bind(ICarSummaryCase::class, CarSummaryCase::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
