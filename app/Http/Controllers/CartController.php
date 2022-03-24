<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(){
        $carts = Session::get('carts');
        return view('frontends.cart',['carts'=>$carts]);
    }

    public function create($id){
        $product = Product::find($id);
        if(Session::exists('carts')){
           $cart =  Session::get('carts');
           $cart[$id]=[
               'title'=>$product->title,
               'description'=>$product->description,
               'image'=>$product->image,
               'price'=>$product->price,
               'qty'=>1,
           ];
           Session::put('carts',$cart);
        }else{
            Session::put('carts',[
                $id=>[
                    'title'=>$product->title,
                    'description'=>$product->description,
                    'image'=>$product->image,
                    'price'=>$product->price,
                    'qty'=>1,
                ]
            ]);
        }
        // return Session::get('carts');
        $count = count(Session::get('carts'));
        // echo $count;
        Session::put('count',$count);
        return redirect()->back();
    }

    public function add($key){
        $carts = Session::get('carts');
        $carts[$key]['qty']++;
        Session::put('carts',$carts);
        return redirect()->back();
        
    }

    public function subtract($key){
        $carts = Session::get('carts');
        if($carts[$key]['qty'] != 1){
            $carts[$key]['qty']--;
        }
        
        Session::put('carts',$carts);
        return redirect()->back();
    }

    public function delete($key){
        $carts = Session::get('carts');
        unset($carts[$key]);
        Session::put('carts',$carts);
        return redirect()->back();
    }

    public function checkOut(Request $request){
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);

        $customer = Customer::create([
            'name'=>$request->name,
            'phone_number'=>$request->phone,
            'address'=>$request->address,
        ]);

        $carts = Session::get('carts');
        foreach($carts as $cart){
            Order::create([
                'title'=>$cart['title'],
                'description'=>$cart['description'],
                'image'=>$cart['image'],
                'qty'=>$cart['qty'],
                'price'=>$cart['price'],
                'customer_id'=>$customer->id,
            ]);
        }
        Session::forget('carts');
        return redirect('/message');
    }

    public function message(){
        return view('frontends.message');
    }
}
