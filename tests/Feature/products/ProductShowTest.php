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
        $response = $this->get(route('products.show', 1));
        $response->assertSuccessful();
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
        $response = $this->get(route('products.show', 100));
        $response->assertStatus(404);
    }
}
