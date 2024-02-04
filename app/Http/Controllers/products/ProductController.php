<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use App\Services\IProductsService;
use Illuminate\Http\Request;

final class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IProductsService $ProductsServiceervice)
    {
        return response(['products' => []], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
