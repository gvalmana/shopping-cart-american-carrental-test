<?php

namespace Tests\Feature\orders;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MakeOrderTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }
    public function test_make_order_with_two_products()
    {
        $products = [
            [
                'id' => 1,
                'quantity' => 2
            ],
            [
                'id' => 2,
                'quantity' => 1
            ]
        ];
        $data=[
            'client_name' => 'Test Name User',
            'client_phone' => '123456789',
            'client_email' => 'wSb5v@example.com',
            'products' => $products
        ];
        $response = $this->postJson(route('cars.order'), $data);
        $response->assertSuccessful();
        $this->assertDatabaseHas('car_orders', [
            'client_name' => $data['client_name'],
            'client_phone' => $data['client_phone'],
            'client_email' => $data['client_email']
        ]);
        $this->assertDatabaseCount('car_orders',1);
        $this->assertDatabaseHas('car_items', ['quantity' => 2, 'car_order_id' => 1,'product_id' => 1]);
        $this->assertDatabaseHas('car_items', ['quantity' => 1, 'car_order_id' => 1,'product_id' => 2]);
        $this->assertDatabaseCount('car_items', 2);
    }
    public function test_make_order_with_three_products()
    {
        $products = [
            [
                'id' => 1,
                'quantity' => 2
            ],
            [
                'id' => 2,
                'quantity' => 1
            ],
            [
                'id' => 3,
                'quantity' => 1
            ]
        ];
        $data=[
            'client_name' => 'Test Name User',
            'client_phone' => '123456789',
            'client_email' => 'wSb5v@example.com',
            'products' => $products
        ];
        $response = $this->postJson(route('cars.order'), $data);
        $response->assertSuccessful();
        $this->assertDatabaseHas('car_orders', [
            'client_name' => $data['client_name'],
            'client_phone' => $data['client_phone'],
            'client_email' => $data['client_email']
        ]);
        $this->assertDatabaseCount('car_orders',1);
        $this->assertDatabaseHas('car_items', ['quantity' => 2, 'car_order_id' => 1,'product_id' => 1]);
        $this->assertDatabaseHas('car_items', ['quantity' => 1, 'car_order_id' => 1,'product_id' => 2]);
        $this->assertDatabaseHas('car_items', ['quantity' => 1, 'car_order_id' => 1,'product_id' => 3]);
        $this->assertDatabaseCount('car_items', 3);
    }
}
