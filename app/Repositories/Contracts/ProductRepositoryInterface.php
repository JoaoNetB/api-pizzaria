<?php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface
{

    public function getAllProducts();
    public function getProductById($id);
}
