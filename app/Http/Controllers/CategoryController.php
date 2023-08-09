<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Redirect;

class CategoryController extends Controller
{
    public function index()
    {
//        $categories = Category::get();
//        $products = Product::get();
        return view('categories.index');
    }

    public function add(Request $request){
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return Redirect()->back()->with('success', 'category updated successfully');

    }

    public function update(Request $request){
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->save();
        return Redirect()->back()->with('success', 'category updated successfully');

    }

//    public function delete(Request $request){
//        $category = Category::find($request->id);
//        $product = Product::where('category_id', $request->id)->get();
//        if($product === null){
//            return Redirect()->back()->with('error', 'sorry the category has products, It cannot be deleted');
//        }
//        else{
//            $category->delete();
//            return redirect()->route('category-index');
//        }
//    }
}
