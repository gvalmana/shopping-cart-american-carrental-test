<?php

namespace App\Http\Controllers\shopping;

use App\Http\Controllers\Controller;
use App\Services\shopping\IProductsService;
use App\Traits\HttpResponsable;
use Illuminate\Http\Request;

/**
* @OA\Info(title="API Shop Cart", version="1.0")
*
* @OA\Server(url="http://95.183.53.25:8081", description="Production Server")
* @OA\Server(url="http://localhost:8081", description="Local Server")
*/
final class ProductController extends Controller
{
    use HttpResponsable;

    /**
    * @OA\Get(
    *     path="/api/v1/products",
    *     summary="Mostrar productos",
    *     tags={"Productos"},
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar todos los productos."
    *     ),
    *     @OA\Response(
    *         response=500,
    *         description="Ha ocurrido un error."
    *     )
    * )
    */
    public function index(IProductsService $productService)
    {
        $data = $productService->getProducts();
        return $this->makeResponseOK($data,"OK");
    }

    /**
    * @OA\Get(
    *     path="/api/v1/products/{id}",
    *     tags={"Productos"},
    *     @OA\Parameter(
    *         name="id",
    *         in="path",
    *         required=true),
    *     summary="Mostrar producto",
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar un solo producto."
    *     ),
    *     @OA\Response(
    *         response=404,
    *         description="Producto no encontrado."
    *     ),
    *     @OA\Response(
    *         response=500,
    *         description="Ha ocurrido un error."
    *     )
    * )
    */
    public function show(string $id, IProductsService $productService)
    {
        $data = $productService->getProduct($id);
        return $this->makeResponseOK($data,"OK");
    }
}
