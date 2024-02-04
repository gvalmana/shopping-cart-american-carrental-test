<?php

namespace Tests\Feature\products;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsListTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_products_can_be_listed(): void
    {
        $response = $this->get('/api/v1/products');

        $response->assertStatus(200);
        $response->assertJsonCount(3, 'data');
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'code',
                    'price'
                ]
            ],
        ]);
    }

    public function test_product_can_be_obtained(): void
    {
        $response = $this->get('/api/v1/products/1');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'code',
                'price'
            ],
        ]);
    }

    public function test_product_can_not_be_found(): void
    {
        $response = $this->get('/api/v1/products/100');
        $response->assertStatus(500);
    }
}
