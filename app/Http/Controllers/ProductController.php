<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::get();
        return view('dashboard',['products'=>$products]);
    }
    public function create(){
        return view('create');
    }
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif'
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'), $imageName);

        $product = new Product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description =$request->description;

        $product->save();

        return redirect()->route('dashboard')->withSuccess("Product Created Successfully.");
    }

    public function edit($id){
        $product = Product::where('id', $id)->first();
        return view('edit',['product'=>$product]);
    }

    public function update(Request $request , $id){

       
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif'
        ]);
        $product = Product::where('id', $id)->first();

        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }


        $product->name = $request->name;
        $product->description =$request->description;

        $product->save();

        // return response()->withSuccess("Product Updated  Successfully.");

        return redirect()->route('dashboard')->withSuccess("Product Updated  Successfully.");
    }
    public function delete($id){
        $product = Product::where('id', $id)->first();
        $product->delete();

        return redirect()->route('dashboard')->withSuccess("Product Deleted  Successfully.");
    }
}
