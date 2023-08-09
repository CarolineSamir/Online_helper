<?php

namespace App\Http\Controllers;

use App\CPU\Helper;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    function index(){
        $customers = Customer::get();
        return view('customers.index' , compact('customers'));
    }

    function new(){
        $customer = Customer::get();
        return view('customers.new', compact('customer'));
    }

    function add(Request $request){
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();
        return Redirect()->route('customer-index')->with('success', 'customer added successfully');
    }

    function show($id){
        $customer = Customer::find($id);
        $category = Category::all();
        $orders = Helper::customerOrders($id);
        return view('customers.orders', compact('customer', 'orders' , 'category'));

    }

    function update(Request $request){
        $customer = Customer::find($request->id);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();
        return response()->json('success', 201);
//        return Redirect()->back()->with('success', 'customer updated successfully');
    }

    function delete(Request $request){
        $order = Order::where('customer_id', $request->id);
        if($order){
            $error = 'customer has orders it can not be deleted';
            return redirect(route('customer-index'), $error);
        }
        $customer = Customer::find($request->id);
        $customer->delete();
        return Redirect()->back()->with('error', 'customer deleted');
    }

}

