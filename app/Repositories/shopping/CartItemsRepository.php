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
}
