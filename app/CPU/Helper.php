<?php
namespace App\CPU;

use App\Models\Customer;
use App\Models\Order;

class Helper{

    public static function customerOrders($customer_id){
        $customer = Customer::find($customer_id);
        return Order::where('customer_id', $customer->id)->get();
    }


}
