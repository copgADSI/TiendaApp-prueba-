<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all()->toArray();
        $brands = Brand::all()->toArray();
        $sizes = Size::all()->toArray();
        return view('welcome', compact('products', 'brands', 'sizes'));
    }

    /**
     * método para crear un producto nunevo
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required',
            'quantity' => 'required',
            'brand_id' => 'required',
            'size_id' => 'required',
            'remarks' => 'required',
        ]);

        $product = $product->firstOrCreate($request->except(['_token']));
        return view('details', compact('product') );
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
            return view('details', compact('product'));
        } else {
            $message = 'No existe producto';
            return view('details', compact('message'));
        }
    }


    public function view_update_form(Request $request)
    {
        $product = (new ProductsDashboard())->get_details($request->id);
        $sizes = Size::where('id', '<>', $product[0]->size_id)->get();
        $brands = Brand::where('id', '<>', $product[0]->brand_id)->get();
        if (!is_null($product)) {
            $product = json_decode(
                json_encode($product[0]),
                true
            );
            return view('update', compact('product', 'sizes', 'brands'));
        } else {
            $message = 'No existe producto';
            return view('details', compact('message'));
        }
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $validated = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'quantity' => 'required',
            'brand_id' => 'required',
            'size_id' => 'required',
            'remarks' => 'required',
            'date_shipment' => 'required',
        ]);
        $compare_fields = array_diff(Product::KEYS_FIELDS,  array_keys($request->all()));
        if (count($compare_fields) === 0) {
            $productsDB = $product->where('id', '=', $request->id);
            $productsDB->update($request->except(['_token']));
            $product = $productsDB->first()->toArray();
            return view('details', compact('product'));
        } else {
            return back()->with($compare_fields);
        }
    }


    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, Product $product)
    {
        $request->validate([
            'id' => 'required'
        ]);
        
        $d = $product->where('id', '=', $request->id)->delete();
        $products = $product->all()->toArray();
        return view('welcome',compact('products'));
    }
}
