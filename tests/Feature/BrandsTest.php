<?php

namespace Tests\Feature;

use App\Models\Brand;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BrandsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_view()
    {
        $response = $this->get(route('brands.index'));
        $response->assertStatus(200);
    }


    public function test_a_delete_brand()
    {
        
        $brands = Brand::inRandomOrder()->first()->id;
        $response = $this->get(route('brands.delete_data', ['id' => $brands]));
        $response->assertStatus(200);
    }
}
