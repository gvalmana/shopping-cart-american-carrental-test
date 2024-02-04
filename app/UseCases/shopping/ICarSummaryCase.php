<?php

namespace App\UseCases\shopping;

use App\Http\Requests\shopping\CarSummaryRequest;
use Illuminate\Foundation\Http\FormRequest;

interface ICarSummaryCase
{
    public function makeSummary(FormRequest $request);
}
