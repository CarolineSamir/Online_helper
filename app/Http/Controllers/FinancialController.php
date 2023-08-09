<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Financial;
use App\Models\Order;
use App\Models\Product;
use App\Models\Revenue;
use Illuminate\Http\Request;

class FinancialController extends Controller
{
    public function index(){
        $financials = new Financial();
        $orders = new Order();
        $customers = new Customer();
        $products = new Product();
        $revenues = new Revenue();
        return view('home' ,compact('financials', 'orders', 'products' , 'customers', 'revenues'));
    }
}
