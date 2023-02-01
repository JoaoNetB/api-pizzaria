<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository implements Contracts\ProductRepositoryInterface
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
}
