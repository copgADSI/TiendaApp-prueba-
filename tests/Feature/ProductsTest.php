<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Product;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    public function test_a_view_welcome()
    {
        $response = $this->get(route('products.index'));
        $response->assertStatus(200);
    }

    public function test_a_view_details()
    {
        $product_id = Product::inRandomOrder()->first()->id;
        $response = $this->get(route('products.details', [
            'id' => $product_id
        ]));
        $response->assertStatus(200);
    }

    public function test_a_product_update()
    {
        $product_id = Product::inRandomOrder()->first()->id;
        $brand_id = Brand::inRandomOrder()->first()->id;
        $size_id = Brand::inRandomOrder()->first()->id;
        $response = $this->get(route('products.form_update', [
            'id' => $product_id,
            'name' => 'Camiseta selección Colombia',
            'quantity' => 12,
            'brand_id' => $brand_id,
            'size_id' => $size_id,
            'remarks' => 'Camiseta de Colombia 2022'
        ]));
        //$this->assertDatabaseHas('products', );
        $response->assertStatus(200);
    }
}
