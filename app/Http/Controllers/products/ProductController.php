<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use App\Services\IProductsService;
use App\Traits\HttpResponsable;
use Illuminate\Http\Request;

final class ProductController extends Controller
{
    use HttpResponsable;
    public function index(IProductsService $productService)
    {
        $data = $productService->getProducts();
        return $this->makeResponseOK($data, 200);
    }

    public function show(string $id, IProductsService $productService)
    {
        $data = $productService->getProduct($id);
        return $this->makeResponseOK($data, 200);
    }
}
