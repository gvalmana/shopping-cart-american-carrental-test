<?php

namespace Tests\Feature\orders;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderValidationTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_order_cant_sent_without_client_email():void
    {
        $data = [
            'client_name' => 'Test Name User',
            'client_phone' => '123456789',
            'products' => [
                [
                    'id' => 1,
                    'quantity' => 2
                ],
                [
                    'id' => 2,
                    'quantity' => 1
                ]
            ]
        ];
        $response = $this->postJson(route('cars.order'), $data);
        $response->assertStatus(422);
        $response->assertJsonStructure([
            'message',
            'errors' => [
                'client_email'
            ]
        ]);
    }

    public function test_order_cant_sent_without_client_name(): void
    {
        $data = [
            'client_email' => 'wSb5v@example.com',
            'client_phone' => '123456789',
            'products' => [
                [
                    'id' => 1,
                    'quantity' => 2
                ],
                [
                    'id' => 2,
                    'quantity' => 1
                ]
            ]
        ];
        $response = $this->postJson(route('cars.order'), $data);
        $response->assertStatus(422);
        $response->assertJsonStructure([
            'message',
            'errors' => [
                'client_name'
            ]
        ]);
    }
    public function test_order_cant_sent_without_client_phone(): void
    {
        $data = [
            'client_name' => 'Test Name User',
            'client_email' => 'wSb5v@example.com',
            'products' => [
                [
                    'id' => 1,
                    'quantity' => 2
                ],
                [
                    'id' => 2,
                    'quantity' => 1
                ]
            ]
        ];
        $response = $this->postJson(route('cars.order'), $data);
        $response->assertStatus(422);
        $response = $this->postJson(route('cars.order'), $data);
        $response->assertStatus(422);
        $response->assertJsonStructure([
            'message',
            'errors' => [
                'client_phone'
            ]
        ]);
    }

    public function test_order_cant_sent_without_products_data(): void
    {
        $data = [
            'client_name' => 'Test Name User',
            'client_phone' => '123456789',
            'client_email' => 'wSb5v@example.com',
        ];
        $response = $this->postJson(route('cars.order'), $data);
        $response->assertStatus(422);
        $response->assertJsonStructure([
            'message',
            'errors' => [
                'products'
            ]
        ]);
    }
}
