<?php
namespace App\Repositories\shopping;

use App\Repositories\BaseRepository;
use App\Models\shopping\Product;
use Illuminate\Database\Eloquent\Model;

class ProductsRepository extends BaseRepository implements IProductsRepository
{
    protected $model = Product::class;
    public function __construct()
    {
        parent::__construct(new $this->model);
    }
}
