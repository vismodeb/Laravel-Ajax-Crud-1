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
    
    //add prodect
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

    //update prodect
    public function updateProduct(Request $request){
        $request->validate(
            [
                'up_name' => 'required|unique:products,name,'.$request->up_id,
                'up_price' => 'required',
            ],
            [
                'up_name.required' => 'Name is Required',
                'up_name.unique' => 'product Already Exists',
                'up_price.required' => 'Price is Required',
            ]
        );

        Product::where('id',$request->up_id)->update([
            'name'=>$request->up_name,
            'price'=>$request->up_price,
        ]);

        return response()->json([
            'status'=>'success',
        ]);
    }
}
