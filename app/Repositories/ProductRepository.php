<?php namespace App\Repositories;

use App\Models\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository
{

    public function model()
    {
        return Product::class;
    }
}