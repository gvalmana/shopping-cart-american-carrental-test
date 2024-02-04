<?php

namespace App\UseCases\shopping;

use App\Http\Requests\shopping\CarSummaryRequest;
use App\Repositories\shopping\IProductsRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class CarSummaryCase implements ICarSummaryCase
{
    private IProductsRepository $productsRepository;
    public function __construct(IProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    public function makeSummary(FormRequest $request)
    {
        $products_request = $request->products;
        $products_ids = array_column($products_request, 'id');
        $models = $this->productsRepository->findByIds($products_ids);

        $summary = [
            'total' => 0,
            'products' => array_map(function ($model) use ($products_request) {
                $product = collect($products_request)->firstWhere('id', $model['id']);
                return [
                    'id' => $model['id'],
                    'price' => $model['price'],
                    'name' => $model['name'],
                    'total' => $product['quantity'] * $model['price'], // total = quantity * price
                ];
            }, $models->toArray())
        ];

        $summary['total'] = array_sum(array_column($summary['products'], 'total'));

        return $summary;
    }
}
