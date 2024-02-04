<?php

namespace Tests\Feature\cars;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CarsSummaryTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void{
        parent::setUp();
        $this->seed();
    }

    public function test_summary_cant_be_obtained_with_empty_data()
    {
        $data = [];
        $response = $this->postJson(route('cars.summary'), $data);
        $response->assertStatus(422);
    }

    public function test_summary_cant_be_obtained_with_empty_product_id()
    {
        $data = [
            'products' => [
                [
                    'quantity' => 1
                ]
            ]
        ];
        $response = $this->postJson(route('cars.summary'), $data);
        $response->assertStatus(422);
    }
    public function test_summary_cant_be_obtained_with_empty_product_quantity()
    {
        $data = [
            'products' => [
                [
                    'id' => 1
                ]
            ]
        ];
        $response = $this->postJson(route('cars.summary'), $data);
        $response->assertStatus(422);
    }
    public function test_summary_cant_be_obtained_with_empty_product_missing_data()
    {
        $data = [
            'products' => [
                [
                    'id' => 1,
                    'quantity' => 2
                ],
                [

                ]
            ]
        ];
        $response = $this->postJson(route('cars.summary'), $data);
        $response->assertStatus(422);
    }
    public function test_summary_cant_be_obtained_with_empty_product_missing_quantity_for_one_product()
    {
        $data = [
            'products' => [
                [
                    'id' => 1,
                    'quantity' => 2
                ],
                [
                    'id' => 2
                ]
            ]
        ];
        $response = $this->postJson(route('cars.summary'), $data);
        $response->assertStatus(422);
    }
    public function test_summary_cant_be_obtained_with_empty_product_missing_id_for_one_product()
    {
        $data = [
            'products' => [
                [
                    'id' => 1,
                    'quantity' => 2
                ],
                [
                    'quanity' => 2
                ]
            ]
        ];
        $response = $this->postJson(route('cars.summary'), $data);
        $response->assertStatus(422);
    }

    public function test_summary_can_be_obtained_for_one_product()
    {
        $data = [
            'products' => [
                [
                    'id' => 1,
                    'quantity' => 2
                ]
            ]
        ];
        $response = $this->postJson(route('cars.summary'), $data);
        $response->assertSuccessful();
    }
    public function test_summary_can_be_obtained_for_more_than_one_product()
    {
        $data = [
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
        $response = $this->postJson(route('cars.summary'), $data);
        $response->assertSuccessful();
    }

    public function test_summary_can_not_be_obtained_for_not_existing_product()
    {
        $data = [
            'products' => [
                [
                    'id' => 100,
                    'quantity' => 2
                ]
            ]
        ];
        $response = $this->postJson(route('cars.summary'), $data);
        $response->assertStatus(422);
    }

    public function test_summary_can_not_be_obtained_for_more_than_one_not_existing_product()
    {
        $data = [
            'products' => [
                [
                    'id' => 100,
                    'quantity' => 2
                ],
                [
                    'id' => 101,
                    'quantity' => 2
                ]
            ]
        ];
        $response = $this->postJson(route('cars.summary'), $data);
        $response->assertStatus(422);
    }
    public function test_summary_can_not_be_obtained_for_one_not_existing_product_and_one_existing()
    {
        $data = [
            'products' => [
                [
                    'id' => 100,
                    'quantity' => 2
                ],
                [
                    'id' => 1,
                    'quantity' => 2
                ]
            ]
        ];
        $response = $this->postJson(route('cars.summary'), $data);
        $response->assertStatus(422);
    }
}
