<?php
namespace App\Repositories\shopping;

use App\Models\shopping\CarItem;
use App\Repositories\BaseRepository;

class CartItemsRepository extends BaseRepository implements ICarItemsRepository
{
    protected $model = CarItem::class;

    public function __construct()
    {
        parent::__construct(new $this->model);
    }
    public function createFromCar(array $data)
    {
        $orderId = $data['order_id'];
        $products = $data['products'];
        foreach ($products as $product) {
            $this->create([
                'quantity' => $product['quantity'],
                'car_order_id' => $orderId,
                'product_id' => $product['id']
            ]);
        }
    }
}
