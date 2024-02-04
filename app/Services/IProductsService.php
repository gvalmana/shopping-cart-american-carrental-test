<?php

namespace App\Services;

interface IProductsService
{
    public function getProducts();
    public function getProduct($id);
}
