<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all()->toArray();
        return view('welcome', compact('products'));
    }

     /**
     * retorna una vista para modificar el producto
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function details(Request $request)
    {
        $product = Product::where("id", "=", $request->id);
        
        if (!is_null($product->first())) {
            $product = $product->first()->toArray();
            return view('details',compact('product'));
        }else{
            $message = 'No existe producto';
            return view('details',compact('message'));
        }
    }


    public function view_update_form(Request $request)
    {
        $product = (new ProductsDashboard())->get_details($request->id);
        $brands = Brand::where("id", "<>", $product[0]->brand_id)->get();
        dd($brands->get());
        if (!is_null($product)) {
            $product = json_decode(
                json_encode($product[0]),true
            );

            return view('update',compact('product'));
        }else{
            $message = 'No existe producto';
            return view('details',compact('message'));
        }
    }
}
