<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(5);
        return view('backends.products.index',['products'=>$products]);
    }
    public function create(){
        return view('backends.products.create');
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required',
        ]);

        $file = $request->file('image');
        $fileName = rand().$file->getClientOriginalName();
        $file->move(public_path('assets/products'),$fileName);
        Product::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'image'=>$fileName,
        ]);
        return redirect()->back()->with('status','Product Created Successfully!');
    }

    public function edit($id){
        $product = Product::find($id);
        return view('backends.products.edit',['product'=>$product]);
    }

    public function update(Request $request,$id){
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required',
        ]);

        $file = $request->file('image');
        $fileName = rand().$file->getClientOriginalName();
        $file->move(public_path('assets/products'),$fileName);
        Product::find($id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'image'=>$fileName,
        ]);
        return redirect('products')->with('status','Product Updated Successfully!');
    }

    public function destroy($id){
        Product::destroy($id);
        return redirect()->back()->with('status','Product Delected Successfully!');
    }
}
