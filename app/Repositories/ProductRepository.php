<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    protected $entity;

    public function __construct(Product $product)
    {
        $this->entity = $product;
    }

    public function getAllProducts()
    {
        return $this->entity->paginate(10);
    }


    public function getProductById($id)
    {
        return $this->entity->find($id);
    }
}
