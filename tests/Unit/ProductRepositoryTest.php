<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductRepositoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_repository_get_all_products()
    {
        Product::factory(25)->create();

        $product = new Product();

        $productRepository = new ProductRepository($product);

        $response = $productRepository->getAllProducts();

        $this->assertCount(10, $response);
    }

    public function test_repository_get_product_by_id()
    {
        Product::factory(2)->create();

        $product = new Product();

        $productRepository = new ProductRepository($product);

        $response = $productRepository->getProductById(2);

        $this->assertEquals(2, $response->id);
    }

}
