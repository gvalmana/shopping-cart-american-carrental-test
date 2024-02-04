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
        $summary =[];
        $products_hashMap = [];
        foreach ($products_request as $product) {
            $products_hashMap[$product['id']] = $product;
        }
        $summary['total'] = 0;
        $summary['products'] = [];
        foreach ($models as $model) {
            $id = intval($model->id);
            $data = [
                'id' => $model->id,
                'price' => $model->price,
                'name' => $model->name,
                'total' => $products_hashMap[$id]['quantity'] * $model->price
            ];
            array_push($summary['products'],$data);
            $summary['total'] += $data['total'];
        }
        return $summary;
    }
}
