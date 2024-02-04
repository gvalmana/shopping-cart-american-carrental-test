<?php
namespace App\Services\shopping\implementations;

use App\Repositories\products\IProductsRepository;
use App\Services\shopping\IProductsService;

class ProductsServiceImpl implements IProductsService
{
    private IProductsRepository $productsRepository;
    public function __construct(IProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }
    public function getProducts(): array
    {
        return $this->productsRepository->all();
    }

    public function getProduct($id){
        return [];
    }
}

