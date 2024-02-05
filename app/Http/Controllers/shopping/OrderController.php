<?php

namespace App\Http\Controllers\shopping;

use App\Http\Controllers\Controller;
use App\Http\Requests\shopping\StoreCarOrderRequest;
use App\Http\Resources\shopping\OrderResource;
use App\Traits\HttpResponsable;
use App\UseCases\shopping\ISendOrderCase;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use HttpResponsable;
    /**
     * @OA\Post(
     *     path="/api/v1/cars/order",
     *     summary="Realizar orden de compra",
     *     tags={"Cars"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *              required={"products","client_name","client_email","client_phone"},
     *              @OA\Property(property="client_name", type="string", example="John Doe"),
     *              @OA\Property(property="client_email", type="string", example="kVqFP@example.com"),
     *              @OA\Property(property="client_phone", type="string", example="+34 123 456 789"),
     *              @OA\Property(
     *                  property="products",
     *                  type="array",
     *                  @OA\Items(
     *                      type="object",
     *                      required={"id","quantity"},
     *                      @OA\Property(property="id", type="integer", example="1"),
     *                      @OA\Property(property="quantity", type="integer", example="2"),
     *                  ),
     *              ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Compra realizada con éxito.",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example="true"),
     *             @OA\Property(property="type", type="string", example="success"),
     *             @OA\Property(property="message", type="string", example="OK"),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer", example="1"),
     *                 @OA\Property(property="client_name", type="string", example="John Doe"),
     *                 @OA\Property(property="client_email", type="string", example="kVqFP@example.com"),
     *                 @OA\Property(property="client_phone", type="string", example="+34 123 456 789"),
     *                 @OA\Property(property="total", type="integer", example="200"),
     *                 @OA\Property(property="date", type="string", example="2024-02-05T02:47:59.000000Z"),
     *                 @OA\Property(property="items", type="array", @OA\Items(
     *                     @OA\Property(property="quantity", type="integer", example="10"),
     *                     @OA\Property(property="total", type="float", example=20.19),
     *                     @OA\Property(property="product", type="object",
     *                         @OA\Property(property="id", type="integer", example="1"),
     *                         @OA\Property(property="name", type="string", example="Product 1"),
     *                         @OA\Property(property="price", type="float", example=10.99),
     *                         @OA\Property(property="code", type="string", example="ABC123"),
     *                         @OA\Property(property="description", type="string", example="Product 1 description"),
     *                         @OA\Property(property="image", type="string", example="https://example.com/image.jpg"),
     * )
     *       )),
     *           ),
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Datos de entrada no válidos",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The given data was invalid."),
     *         @OA\Property(
     *              property="errors",
     *              type="object",
     *              @OA\Property(
     *                  property="products",
     *                  type="array",
     *                  @OA\Items(
     *                      type="string",
     *                      example="The products field is required."
     *                  ),
     *              ),
     *              @OA\Property(
     *                  property="products.0.id",
     *                  type="array",
     *                  @OA\Items(
     *                      type="string",
     *                      example="The products.0.id field is required."
     *                  ),
     *              ),
     *              @OA\Property(
     *                  property="products.0.quantity",
     *                  type="array",
     *                  @OA\Items(
     *                      type="string",
     *                      example="The products.0.quantity field is required."
     *                  ),
     *              ),
     *          ),
     *         )
     *     )
     * )
     */
    public function order(StoreCarOrderRequest $request, ISendOrderCase $carSummaryCase)
    {
        $data = $carSummaryCase->makeOrder($request);
        return $this->makeResponseOK(OrderResource::make($data), "OK");
    }
}
