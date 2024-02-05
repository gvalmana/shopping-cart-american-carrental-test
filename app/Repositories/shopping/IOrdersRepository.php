<?php
namespace App\Repositories\shopping;

interface IOrdersRepository
{
    public function __construct();
    public function all();
    public function find($id);
    public function findByIds(array $ids);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function restore($id);
}
