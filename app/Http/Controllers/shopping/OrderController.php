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
    public function order(StoreCarOrderRequest $request, ISendOrderCase $carSummaryCase)
    {
        $data = $carSummaryCase->makeOrder($request);
        return $this->makeResponseOK(OrderResource::make($data));
    }
}
