<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function allProducts()
    {
        $product = $this->productService->getAllProducts();

        return response()->json($product);
    }

    public function productById(Request $request)
    {
        $product = $this->productService->getProductById($request["id"]);

        return response()->json($product);
    }
}
