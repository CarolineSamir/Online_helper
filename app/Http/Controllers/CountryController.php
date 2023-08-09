<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(){
        $countries = Country::get();
        return view('countries.index', compact('countries'));
    }

    public function new(){
        $countries = Country::get();
        return view('countries.new', compact('countries'));
    }

    public function add(Request $request){
        $country = new Country();
        $country->name = $request->name;
        $country->sub_of = $request->sub_of;
        $country->save();
        return Redirect()->back()->with('success', 'country added successfully');

    }

    public function update(Request $request){
        $country = Country::find($request->id);
        $country->name = $request->name;
        $country->save();
        return Redirect()->back()->with('success', 'country updated successfully');
    }
}
