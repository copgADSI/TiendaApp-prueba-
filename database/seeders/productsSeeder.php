<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Size;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class productsSeeder extends Seeder
{
    const SIZES = ['S', 'L', 'M'];
    const BRANDS = ['Adidas', 'Nike', 'Puma', 'Reebook'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 3; $i++) {
            DB::table('sizes')->insert([
                'size' => self::SIZES[$i]
            ]);
        }

        for ($i = 0; $i < count(self::BRANDS); $i++) {
            DB::table('brands')->insert([
                'brand' => self::BRANDS[$i]
            ]);
        }

        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $size = Size::inRandomOrder()->first();
            $brand = Brand::inRandomOrder()->first();
            DB::table('products')->insert(
                array(
                    'id' =>  $faker->unique()->randomNumber,
                    'name' => 'Camiseta blanca',
                    'size_id' => $size->id,
                    'remarks' => 'Camiseta de algodón',
                    'brand_id' => $brand->id,
                    'quantity' => rand(0, 100),
                    'date_shipment' => date('y-m-d')
                )
            );
        }
    }
}
