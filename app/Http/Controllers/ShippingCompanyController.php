<?php

namespace App\Http\Controllers;

use App\Models\Revenue;
use App\Models\Shipment;
use App\Models\ShippingCompany;
use Illuminate\Http\Request;

class ShippingCompanyController extends Controller
{
    public function index()
    {
        $companies = ShippingCompany::get();
        return view('shipping companies.index', compact('companies'));
    }

    public function new()
    {
        $companies = ShippingCompany::get();
        return view('shipping companies.new', compact('companies'));
    }

    public function add(Request $request){
       $costs =  $request->costs ;
       $country_id =  $request->country_id ;

        $city_price = [];
       foreach ($costs as $index => $cost) {
           $city_price[$country_id[$index]] = $cost     ;
       }


        $companies = new ShippingCompany();
        $companies->name = $request->name;
        $companies->city_price = $city_price;
        $companies->save();
        return Redirect()->back()->with('success', 'company added successfully');
    }

    public function update(Request $request){
        $costs =  $request->costs ;
        $country_id =  $request->country_id ;
        $city_price = [];
        foreach ($costs as $index => $cost) {
            $city_price[$country_id[$index]] = $cost     ;
        }
        $companies = ShippingCompany::find($request->id);
        $companies->name = $request->name;
        $companies->city_price = $city_price;
        $companies->save();
        return Redirect()->back()->with('success', 'company updated');

    }

    public function delete(Request $request){
        $company = ShippingCompany::find($request->id);
        $revenue = Revenue::where('company_id', $request->id)->first();
        $shipment = Shipment::where('shipping_company_id', $request->id)->first();
        if($revenue){
            return Redirect()->back()->with('error', 'company has revenue is not collected yet');
        }
        if($shipment){
            return Redirect()->back()->with('error', 'company has shipments');
        }
        else{
            $company->delete();
            return Redirect()->back()->with('success', 'company deleted');
        }
    }
}
