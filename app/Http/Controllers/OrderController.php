<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Financial;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request){
        $products = Product::get();
        $categories = Category::get();
        $customers = Customer::get();
        if ($request->status){
            $orders = Order::where('status', $request->status)->get();

        }else{
            $orders = Order::where('status', 0)->get();

        }
        return view('orders.index', compact('orders' , 'request', 'products', 'categories', 'customers' ));
    }

    public function new()
    {
        $products = Product::get();
        $categories = Category::get();
        $customers = Customer::get();
        return view('orders.new', compact('products', 'categories', 'customers'));
    }

    public function add(Request $request)
    {
        $order = new Order();
        $order->product_id = $request->product_id;
        $order->notes = $request->notes;
        if ($request->customer_type === 'new') {

            $customer = new Customer();
            $customer->name = $request->customer_name;
            $customer->address = $request->customer_address;
            $customer->phone = $request->customer_phone;
            $customer->save();

            $order->customer_id = $customer->id;
        } else {
            $order->customer_id = $request->customer_id;
        }
        $order->save();

        $product = Product::find($request->product_id);
        $product->amount = $product->amount - 1;
        $product->save();

        return Redirect()->back()->with('success', 'order added successfully');
    }

    public function edit($id){
        $order = Order::find($id);
        $products = Product::get();
        $categories = Category::get();
        $customers = Customer::get();
        return view('orders.edit', compact('products', 'categories', 'customers','order'));
    }

    public function update(Request $request){
        $order = Order::find($request->id);
        $order->product_id  = $request->product_id;
        $order->notes = $request->notes;
        if ($request->customer_type === 'new') {

            $customer = new Customer();
            $customer->name = $request->customer_name;
            $customer->address = $request->customer_address;
            $customer->phone = $request->customer_phone;
            $customer->save();

            $order->customer_id = $customer->id;
        } else {
            $order->customer_id = $request->customer_id;
        }
        $order->save();
        return Redirect()->back()->with('success', 'order updated successfully');

    }

    public function delete(Request $request){
        $order = Order::find($request->id);
        $order->delete();
        return Redirect()->back()->with('error', 'order deleted');
    }

}
