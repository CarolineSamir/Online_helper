<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\PendingOrder;
use App\Models\Order;
use App\Models\Revenue;
use App\Models\Shipment;
use App\Models\ShippingCompany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function index(Request $request){
        if($request->delivered){
            $shipments = Shipment::where('delivered', $request->delivered)->get();

        }
        else{
            $shipments = Shipment::where('delivered',0)->get();
        }
        return view('shipments.index', compact('shipments', 'request'));
    }

    public function new($id){
        $shipments = Shipment::get();
        $companies = ShippingCompany::get();
        $countries = Country::where('sub_of', 0)->get();
        $order = Order::find($id);
        return view('shipments.new', compact('shipments', 'companies', 'order', 'countries'));
    }

    public function add(Request $request){
        $shipments = new Shipment();
        $shipments->order_id= $request->order_id;
        $shipments->deliver_date = $request->deliver_date;
        $shipments->shipping_company_id = $request->company_id;
        $shipments->country_id = $request->country_id;
        $shipments->save();

        $order = Order::find($request->order_id);
        $order->status = 1;
        $order->save();

        return Redirect()->back()->with('success', 'order has been shipped');
    }
    public function delivered(Request $request){
        $order = Order::find($request->order_id);
        $order->status = 2 ;
        $order->save();
        $revenue = new Revenue();
        $revenue->order_id = $request->order_id;
        $revenue->company_id = $request->shipping_company_id;
        $company = ShippingCompany::where('id', $request->shipping_company_id)->first();

        foreach($company->city_price as $id => $city_price){
            if ($request->country_id == $id) {
                $revenue->costs = $company->city_price[$id] + $order->Product->costs;
            }

        }
        $revenue->income = $order->Product->price;
        $revenue->profits = $revenue->income -  $revenue->costs;
        $revenue->save();
        $shipment = Shipment::find($request->shipment_id);
        $shipment->delivered = 1;
        $shipment->save();
        return Redirect()->back()->with('success', 'order is delivered successfully');
    }

}

