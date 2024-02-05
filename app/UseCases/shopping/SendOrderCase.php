<?php
namespace App\UseCases\shopping;

use App\Repositories\shopping\ICarItemsRepository;
use App\Repositories\shopping\IOrdersRepository;
use App\UseCases\shopping\ISendOrderCase;
use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

final class SendOrderCase implements ISendOrderCase
{
    private IOrdersRepository $ordersRepository;
    private ICarItemsRepository $carItemsRepository;
    public function __construct(IOrdersRepository $ordersRepository, ICarItemsRepository $carItemsRepository){
        $this->ordersRepository = $ordersRepository;
        $this->carItemsRepository = $carItemsRepository;
    }
    public function makeOrder(FormRequest $request)
    {
        $model = $this->ordersRepository->create($request->input());
        $this->carItemsRepository->createFromCar(
            [
                'products'=>$request->input('products'),
                'order_id' => $model->id
            ]);
        return $model;
    }
}
