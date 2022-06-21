<?php

namespace App\Http\Controllers;
//namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
//add product
    public function add(){
        return view('admin.products.add');
    }
//store product in database
    public function store(Request $request){
        $product = new Product;
        $product->name =$request->name;
        $product->price =$request->price;
        $product->description =$request->description;

        if (isset($request->image)) {
            //put an rand image name
            //save image in   public/image
            $image_name = rand() . "." . $request->image->getClientOriginalExtension();
            $product->image =  $image_name;
            $request->image->move('image', $image_name);
        }
        $product->save();

        return back();
    }
//return all product
     public function all(){
        $products = Product::all();

        return view('admin.products.all',compact('products'));
    }
//edit product by id selected
     public function edit($id){
       $product= Product::where('id','=',$id)->first();
      return view('admin.products.edit', compact('product'));
    }
//update the product information and save it in database
     public function update($id,Request $request){
        $product = Product::find($id);
        $product->name =$request->name;
        $product->price =$request->price;
        $product->description =$request->description;
        if (isset($request->image)) {
            $image_name = rand() . "." . $request->image->getClientOriginalExtension();
            $product->image =  $image_name;
            $request->image->move('image', $image_name);
        }
     
       $product->save();  
      return redirect('/Products/all');
     }
//delete product from database by id
     public function delete($id){
      $product = product::find($id);
      $product->delete();
      return redirect('/Products/all');
     }
}
