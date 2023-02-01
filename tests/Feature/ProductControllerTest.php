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
    public function test_returns_all_products()
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
}
