<?php

namespace Tests\Feature\cars;

use App\Models\shopping\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CarsSummaryNumbersTest extends TestCase
{
    use RefreshDatabase;

    public function test_correct_numbers_with_one_product(): void
    {
        $producto1 = Product::factory()->create(['id' => 1, 'price' => 100]);
        $data = [
            'products' => [
                [
                    'id' => 1,
                    'quantity' => 1
                ]
            ]
        ];
        $response = $this->postJson(route('cars.summary'), $data);
        $jsonresponse = [
            'success' => true,
            'type'=>'success',
            'data' => [
                'products' => [
                    [
                        'id' => $producto1->id,
                        'price' => $producto1->price,
                        'name' => $producto1->name,
                        'total' => 100
                    ]
                ],
                'total' => 100
            ],
        ];
        $response->assertJson($jsonresponse);
        $response->assertSuccessful();
    }

    public function test_correct_numbers_with_two_products(): void
    {
        $producto1 = Product::factory()->create(['id' => 1, 'price' => 100]);
        $producto2 = Product::factory()->create(['id' => 2, 'price' => 37.5]);
        $data = [
            'products' => [
                [
                    'id' => 1,
                    'quantity' => 1
                ],
                [
                    'id' => 2,
                    'quantity' => 2
                ]
            ]
        ];
        $response = $this->postJson(route('cars.summary'), $data);
        $jsonresponse = [
            'success' => true,
            'type'=>'success',
            'data' => [
                'products' => [
                    [
                        'id' => $producto1->id,
                        'price' => $producto1->price,
                        'name' => $producto1->name,
                        'total' => 100
                    ],
                    [
                        'id' => $producto2->id,
                        'price' => $producto2->price,
                        'name' => $producto2->name,
                        'total' => 75
                    ]
                ],
                'total' => 175
            ],
        ];
        $response->assertJson($jsonresponse);
        $response->assertSuccessful();
    }
}
