<?php

namespace App\Http\Controllers;

use App\Models\PendingOrder;
use Illuminate\Http\Request;

class PendingOrderController extends Controller
{
   public function index(){
       $orders = PendingOrder::get();
       return view('orders.Pending_orders',compact('orders'));
   }
}
