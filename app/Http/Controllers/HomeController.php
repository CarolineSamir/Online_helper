<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Financial;
use App\Models\Order;
use App\Models\Product;
use App\Models\Revenue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $financials = new Financial();
        $orders = new Order();
        $customers = new Customer();
        $products = new Product();
        $revenues = new Revenue();
        return view('home' ,compact('financials', 'orders', 'products' , 'customers', 'revenues'));
    }

//    public function getLanguages(){
//        return view('_messages');
//    }
}
