<?php

namespace App\Services\implementations;

use App\Services\IProductsService;

class ProductsJsonServiceImpl implements IProductsService
{

    public function getProducts(): array
    {
        return $this->loadProductsFromJson();
    }

    private function loadProductsFromJson()
    {
        return [
            "products" => json_decode(file_get_contents(__DIR__ . "/../../../resources/products.json"), true)
        ];
    }
}
