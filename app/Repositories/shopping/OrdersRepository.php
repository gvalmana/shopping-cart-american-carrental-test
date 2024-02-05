<?php
namespace App\Repositories\shopping;

use App\Models\shopping\CarOrder;
use App\Repositories\BaseRepository;

class OrdersRepository extends BaseRepository implements IOrdersRepository
{
    protected $model = CarOrder::class;

    public function __construct()
    {
        parent::__construct(new $this->model);
    }
}
