<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsDashboard extends Controller
{
    public function get_details(int $product_id): array
    {
        return DB::select('
            SELECT products.*, brands.brand, sizes.size FROM products
                JOIN sizes 
                    ON (products.size_id = sizes.id)
                JOIN brands 
                    ON (products.brand_id = brands.id)
            WHERE products.id = ? 
        ', [
            $product_id
        ]);
    }
}
