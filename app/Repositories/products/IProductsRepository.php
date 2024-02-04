<?php
namespace App\Repositories\products;

interface IProductsRepository
{
    public function __construct();
    public function all();
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function restore($id);
}
