<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brand::all()->toArray();
        return view('brands', compact('brands'));
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_brand(Request $request, Brand $brand)
    {
        $brands = $request->except(['_token']);
        $brands_ids = array_keys($brands);
        foreach ($brands as $brand_id => $brand_) {

            $brandDB = $brand->where('id', '=', $brand_id);
            $brandDB->update([
                'brand' => $brand_
            ]);
        }
        $brands = Brand::all()->toArray();
        return view('brands', compact('brands'));
    }

    /**
     * 
     * Eliminar múltiples marcas o una a la vez
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete_brand(Request $request, Brand $brand)
    {
        $brandDB = $brand->where('id', '=', $request->id)->delete();
        $brands = Brand::all()->toArray();
        return view('brands', compact('brands'));
    }
}
