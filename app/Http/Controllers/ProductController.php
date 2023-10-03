<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function ProductController(){
        $products = Product::latest()->paginate(10);
        return view('products',compact('products'));
    }
    
    public function AddProduct(Request $request){
        $request->validate(
            [
                'name' => 'required|unique:products',
                'price' => 'required',
            ],
            [
                'name.required' => 'Name is Required',
                'name.unique' => 'product Already Exists',
                'price.required' => 'Price is Required',
            ]
        );

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
        return response()->json([
            'status'=>'success',
        ]);
    }
}
