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
//        dd($_POST);

//        dd(\request());

//        dd(\request()->all());
        $product_info= request()->all();
        $product = new Product();
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
