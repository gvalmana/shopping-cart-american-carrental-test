<?php

namespace Tests\Feature\products;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsListTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void{
        parent::setUp();
        $this->seed();
    }
    public function test_products_can_be_listed(): void
    {
        $response = $this->get(route('products.index'));

        $response->assertSuccessful();
        $response->assertJsonCount(3, 'data');
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'code',
                    'price',
                    'description',
                    'image'
                ]
            ],
        ]);
    }
}
