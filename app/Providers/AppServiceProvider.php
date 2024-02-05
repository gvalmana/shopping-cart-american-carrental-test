<?php

namespace App\Providers;

use App\Repositories\shopping\IOrdersRepository;
use App\Repositories\shopping\IProductsRepository;
use App\Repositories\shopping\OrdersRepository;
use App\Repositories\shopping\ProductsRepository;
use App\Services\shopping\implementations\ProductsServiceImpl;
use App\Services\shopping\IProductsService;
use App\UseCases\shopping\CarSummaryCase;
use App\UseCases\shopping\ICarSummaryCase;
use App\UseCases\shopping\ISendOrderCase;
use App\UseCases\shopping\SendOrderCase;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Services
        App::singleton(IProductsService::class, ProductsServiceImpl::class);
        //Repositories
        App::bind(IProductsRepository::class, ProductsRepository::class);
        App::bind(IOrdersRepository::class, OrdersRepository::class);
        //Case Uses
        App::singleton(ICarSummaryCase::class, CarSummaryCase::class);
        App::singleton(ISendOrderCase::class, SendOrderCase::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
