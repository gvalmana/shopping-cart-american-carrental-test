<?php

namespace App\Http\Controllers\shopping;

use App\Http\Controllers\Controller;
use App\Http\Requests\shopping\CarSummaryRequest;
use App\Traits\HttpResponsable;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    use HttpResponsable;
    public function summary(CarSummaryRequest $request)
    {
        return $this->makeResponseOK([]);
    }
}
