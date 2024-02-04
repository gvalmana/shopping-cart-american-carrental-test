<?php

namespace App\Services\shopping\implementations;

use App\Services\shopping\IProductsService;

class ProductsJsonServiceImpl implements IProductsService
{

    public function getProducts(): array
    {
        return $this->loadProductsFromJson();
    }

    public function getProduct($id){

        $data = $this->loadProductsFromJson();
        return $data[$id-1];
    }

    private function loadProductsFromJson()
    {
        return json_decode(file_get_contents(__DIR__ . "/../../../../resources/products.json"), true);
    }
}
