<?php

namespace App\UseCases\shopping;

use Illuminate\Foundation\Http\FormRequest;

interface ISendOrderCase
{
    public function makeOrder(FormRequest $request);
}
