<?php

namespace App\Http\Controllers\shopping;

use App\Http\Controllers\Controller;
use App\Http\Requests\shopping\CarSummaryRequest;
use App\Traits\HttpResponsable;
use App\UseCases\shopping\CarSummaryCase;
use App\UseCases\shopping\ICarSummaryCase;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    use HttpResponsable;
    /**
    * @OA\Post(
    *     path="/api/v1/cars/summary",
    *     summary="Mostrar Resumen",
    *     tags={"Cars"},
    *     @OA\RequestBody(
    *         required=true,
    *         @OA\JsonContent(
    *             required={"products"},
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
    *         description="Resumen obtenido con éxito.",
    *         @OA\JsonContent(
    *             @OA\Property(property="success", type="boolean", example="true"),
    *             @OA\Property(property="type", type="string", example="success"),
    *             @OA\Property(property="message", type="string", example="OK"),
    *             @OA\Property(property="data", type="object",
    *                 @OA\Property(property="total", type="integer", example="200"),
    *                 @OA\Property(property="products", type="array", @OA\Items(
    *                     @OA\Property(property="id", type="integer", example="1"),
    *                     @OA\Property(property="price", type="float", example=20.5),
    *                     @OA\Property(property="name", type="string", example="Carro 1"),
    *                     @OA\Property(property="total", type="float", example=20.19),
    *       )),
    *           ),
    *         )
    *     ),
    *     @OA\Response(
    *         response=422,
    *         description="Datos de entrada no válidos",
    *         @OA\JsonContent(
    *             @OA\Property(property="message", type="string", example="The given data was invalid."),
    *          @OA\Property(
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
    public function summary(CarSummaryRequest $request, ICarSummaryCase $carSummaryCase)
    {
        $data = $carSummaryCase->makeSummary($request);
        return $this->makeResponseOK($data,"OK");
    }
}
