<?php

namespace App\Services\shopping;

interface IProductsService
{
    public function getProducts();
    public function getProduct($id);
}
