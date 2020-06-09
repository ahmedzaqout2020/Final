<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products=Product::all();
        return view('add-edit',compact('products'));
    }

    public function create(){
        $product=null;
        return view('add-edit',compact('product'));
    }
    public function add(Request $request){

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
        ]);
        $product=new Product();
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->save();
        return redirect(route('product'));

    }
    public function edit(Product $product){
// $contact=Contact::findOrFail($id);
        return view('add-edit',compact('product'));
    }

    public function update(Request $request,Product $product){
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
        ]);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;

        $product->save();

        return redirect('/product');
    }
    public function destroy(Product $product)
    {
//    $contact = Contact::find($id);
        $product->delete();
        return redirect()->back();

    }
}
