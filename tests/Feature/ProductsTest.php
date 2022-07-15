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

    public function test_a_form_product_update()
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


    public function test_a_update_product_fields()
    {
        $product_id = Product::inRandomOrder()->first()->id;
        $brand_id = Brand::inRandomOrder()->first()->id;
        $size_id = Brand::inRandomOrder()->first()->id;

        $fields = [
            'id' => $product_id,
            'name' => 'Camiseta selección Colombia 2022 profesional',
            'quantity' => 12,
            'brand_id' => $brand_id,
            'size_id' => $size_id,
            'remarks' => 'Camiseta de Colombia 2022',
            'date_shipment' => date('y-m-d')
        ];
        $response = $this->post(route('products.update', $fields));
        $this->assertDatabaseHas('products', $fields);
        
    }

    

    public function test_a_delete_product_fields()
    {
        $product_id = Product::inRandomOrder()->first()->id;
        $product_id = ['id' => $product_id];
        $response = $this->get(route('products.delete', $product_id));
        $response->assertStatus(200);
    }
}
