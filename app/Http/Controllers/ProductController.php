<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
   public function products()
   {
       $products = Product::latest()->paginate(5); // Product Model
       return view('products',compact('products'));
   }
   
   // add product
   public function addProduct( Request $request )
   {
    $request->validate(
        [
            'name'=>'required|unique:products|',
            'price'=>'required',

        ],
        [
            'name.required'=>'Name is required',
            'name.unique'=>'Product already Exists',
            'price.required'=>'Price is required'
        ]
);

        $product = new  Product();  
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
        return response()->json(
            [
                'status'=>'success',

            ]
        );
        
   }


      // update product
      public function updateProduct( Request $request )
      {
        $request->validate(
            [
                'up_name'=>'required|unique:products,name',         //update validation different
                'up_price'=>'required',
    
            ],
            [
                'up_name.required'=>'Name is required',
                'up_name.unique'=>'Product already Exists',
                'up_price.required'=>'Price is required'
            ]
    );
    
    Product::where('id',$request->up_id)->update([
                'name'=>$request->up_name,
                'price'=>$request->up_price,
            ]);
            return response()->json(
                [
                    'status'=>'success',
    
                ]
            );
            
       }



}
