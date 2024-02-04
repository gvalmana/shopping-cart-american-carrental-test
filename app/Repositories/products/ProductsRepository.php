<?php
namespace App\Repositories\products;

use App\Repositories\BaseRepository;
use App\Models\shopping\Product;
class ProductsRepository extends BaseRepository implements IProductsRepository
{
    protected $model = Product::class;
    public function __construct()
    {
        parent::__construct($this->model);
    }
}
