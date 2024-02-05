<?php
namespace App\UseCases\shopping;

use App\Repositories\shopping\IOrdersRepository;
use App\UseCases\shopping\ISendOrderCase;
use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

final class SendOrderCase implements ISendOrderCase
{
    private IOrdersRepository $ordersRepository;
    public function __construct(IOrdersRepository $ordersRepository){
        $this->ordersRepository = $ordersRepository;
    }
    public function makeOrder(FormRequest $request)
    {
        $models = $this->ordersRepository->create($request->input());
        return $models;
    }
}
