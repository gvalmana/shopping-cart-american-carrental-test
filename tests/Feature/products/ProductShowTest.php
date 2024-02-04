<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductShowTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void{
        parent::setUp();
        $this->seed();
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
                'price',
                'description',
                'image'
            ],
        ]);
    }

    public function test_product_can_not_be_found(): void
    {
        $response = $this->get('/api/v1/products/100');
        $response->assertStatus(404);
    }
}
