<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_return_all_products()
    {

        Product::factory()->create([
            "name" => "teste",
            "description" => "tttttt",
            "price" => 18.56,
            "imageUrl" => "http://www.image/image.jpg"
        ]);

        $response = $this->getJson("/api/product/all");

        $response->assertStatus(200);

        $response->assertJson([
            "total" => 1
        ]);
    }

    public function test_return_product_by_id()
    {
        Product::factory()->create([
            "name" => "teste",
            "description" => "tttttt",
            "price" => 18.56,
            "imageUrl" => "http://www.image/image.jpg"
        ]);

        $response = $this->getJson("/api/product/id/1");

        $response->assertStatus(200);

        $response->assertJson(fn (AssertableJson $json) =>
            $json->where("name", "teste")
                ->where("description", "tttttt")
                ->where("price", 18.56)
                ->where("imageUrl", "http://www.image/image.jpg")
                ->etc()
        );
    }

}
