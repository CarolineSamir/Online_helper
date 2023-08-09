<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Session;

class LocalizationController extends Controller
{
    public function changeLang($lang){
        App::setLocale('ar');
        session()->put("lang_code",$lang);
        return redirect()->back();
    }
}
