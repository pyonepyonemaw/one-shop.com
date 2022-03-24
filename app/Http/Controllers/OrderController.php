<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return view('backends.orders.index',['customers'=>$customers]);
    }

    public function show($id){
        $customer = Customer::find($id);
        $orders = Order::where('customer_id',$id)->get();
        return view('backends.orders.show',['orders'=>$orders,'customer'=>$customer]);
    }

    public function delete($id){
        $orders = Order::where('customer_id',$id)->get();
        foreach($orders as $order){
            Order::destroy($order->id);
        }
        Customer::destroy($id);
        return redirect()->back()->with('status','Order Deleted Successfully!');
    }
}
