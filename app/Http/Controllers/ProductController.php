<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //

    public $products = [
        ['id'=>1 , 'name'=>'product1', 'price'=>10] ,
        ['id'=>2 , 'name'=>'product1', 'price'=>10],
        ['id'=>1 , 'name'=>'product1', 'price'=>10],
        ['id'=>1 , 'name'=>'product1', 'price'=>10]
    ];

    function products_index(){
//        return $this->products;

        return view("products.index_", ['products'=>$this->products]);
    }

    function create(){
        return view("products.create");
    }

    function index(){
        $products = Product::all();
//        dd($products); # display data

        return view('products.index', ['products'=>$products]);

    }

    function show($id){
        $product = Product::where('id', $id)->first();
        return view("products.show", ['product'=>$product]);
    }

    function save(){
        ## validate request arguments before submit object...
        request()->validate(
            ["name"=>"required|min:5",
                "price"=>'integer|min:5|max:10'
            ]);

        $product_info= request()->all();  # get request arguments
        $product = new Product();
        $image = request()->image;
        if($image){
            $image_name = time().'.'.$image->extension();
            $product->image = $image_name;
            $image->move(public_path('images/products'), $image_name);
            # I need the actual path to move the image
        }
        $product->name= $product_info['name'];
        $product->price = $product_info['price'];
        $product->save();
//        return to_route('products.index');
        return to_route('products.show', $product->id);
    }

    function destroy($id){
        $product = Product::findOrfail($id);
        $product->delete();
        return to_route('products.index');
    }

}
