<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Services\ProductService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductServiceTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_service_get_all_products()
    {
        Product::factory(25)->create();

        $product = new Product();

        $productRepository = new ProductRepository($product);

        $productService = new ProductService($productRepository);

        $response = $productService->getAllProducts();

        $this->assertCount(10, $response);
    }

    public function test_service_get_product_by_id()
    {
        Product::factory(2)->create();

        $product = new Product();

        $productRepository = new ProductRepository($product);

        $productService = new ProductService($productRepository);

        $response = $productService->getProductById(2);

        $this->assertEquals(2, $response->id);
    }
}
