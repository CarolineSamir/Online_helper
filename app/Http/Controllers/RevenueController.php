<?php

namespace App\Http\Controllers;

use App\Models\Financial;
use App\Models\Revenue;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function index(Request $request){

        if($request->status){
            $revenues = Revenue::where('status',$request->status)->get();
        }
        else{
            $revenues = Revenue::where('status',0)->get();
        }
        return view('financials.revenues', compact('revenues', 'request'));
    }

    public function addToTreasury(Request $request){
        $revenue = Revenue::find($request->id);
        $financial = Financial::find(1);
        if ($financial== null){
            $financial = new Financial();
            $financial->treasury = $revenue->profits;
        }
        else{
            $financial->treasury = $revenue->profits + $financial->treasury ;
        }
        $financial->save();
        $revenue->status = 1 ;
        $revenue->save();
        return Redirect()->back()->with('success', 'revenue collected');

    }


}
