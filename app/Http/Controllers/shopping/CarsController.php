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
    public function summary(CarSummaryRequest $request, ICarSummaryCase $carSummaryCase)
    {
        $data = $carSummaryCase->makeSummary($request);
        return $this->makeResponseOK($data);
    }
}
