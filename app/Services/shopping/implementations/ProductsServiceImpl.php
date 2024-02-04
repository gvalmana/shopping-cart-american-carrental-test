<?php
namespace App\Services\shopping\implementations;

use App\Repositories\shopping\IProductsRepository;
use App\Services\shopping\IProductsService;

class ProductsServiceImpl implements IProductsService
{
    private IProductsRepository $productsRepository;
    public function __construct(IProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }
    public function getProducts()
    {
        return $this->productsRepository->all();
    }

    public function getProduct($id){
        return $this->productsRepository->find($id);
    }
}

