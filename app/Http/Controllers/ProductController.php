<?php

namespace App\Http\Controllers;

use App\CPU\helperImg;
use App\Models\Category;
use App\Models\Financial;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $error = null;
        $products = Product::get();
        $categories = Category::get();
        $financial = Financial::get()->first();
        return view('products.index', compact('products', 'categories', 'financial',))->with('error', $error);
    }

    public function show()
    {
        $products = Product::get();
        $categories = Category::get();
        return view('products.show', compact('products', 'categories'));
    }


    public function new()
    {
        $error = null;
        $products = Product::get();
        $categories = Category::get();

        return view('products.new', compact('products', 'categories',));
    }

    public function add(Request $request)
    {
//        $from = date('2022-09-24');
//        $to = date('2022-09-26');
//        $financial = Financial::whereBetween('created_at', [$from, $to])->sum('profits');

//        $financial = Financial::find(1);
//        if($request->costs < $financial->profits){

//            $financial->profits  =  $financial->profits - $request->costs ;
//            $financial->save();

        $product = new Product();
        $category = new Category();

        $product->name = $request->name;
        $product->description = $request->description;
        $product->amount = $request->amount;
        $product->taxes = $request->taxes / 100 * $request->costs;
        $product->price = $request->price;
        $product->costs = $request->costs;
        if ($request->hasFile('image')) {
            $file = HelperImg:: upload($request->file('image'));
            $product->image = $file;
        }
        if ($request->category_id == 0) {
            $category->name = $request->other;
            $category->save();
            $product->category_id = Category::all()->where('name', $category->name)->value('id');

        } else {
            $product->category_id = $request->category_id;
        }

        $product->save();
        return Redirect()->back()->with('success', 'product added successfully');
//        }else{
//            return Redirect()->back()->with('error', 'your budget is lower than your costs');
//        }
    }

    public function edit($id)
    {
        $order = Order::find($id);
        $product = Product::find($id);
        $categories = Category::get();
        return view('products.edit', compact('product', 'categories', 'order'));
    }

    public function update(Request $request)
    {
        $product = Product::find($request->id);
        $category = Category::find($request->id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->amount = $request->amount;
        $product->price = $request->price;
        $product->taxes = 0 ;
        $product->taxes = $request->taxes / 100 * $request->costs;
        $product->costs = $request->costs;

        if ($request->hasFile('image')) {
            $file = HelperImg:: upload($request->file('image'));

            $product->image = $file;
        }

        if ($request->category_id == 0) {
            $category->name = $request->other;
            $category->save();
            $product->category_id = Category::all()->where('name', $category->name)->value('id');

        } else {
            $product->category_id = $request->category_id;
        }
        $product->save();
        return Redirect()->back()->with('success', 'product updated successfully');
    }

    public function delete(Request $request)
    {
        $order = Order::where('product_id', $request->id)->first();
        if ($order) {
            return Redirect()->back()->with('error', 'product has orders it can not be deleted');
        } else {
            $product = Product::find($request->id);
            $product->delete();
            return Redirect()->back()->with('error', 'product deleted');
        }
    }
}


//$file = $request->file('image');
//$OriginalName = $file->getClientOriginalName();
////            $extension = $file->getclientoriginalextension();
//$fileName = time(). '_' . $OriginalName;
//dd($fileName);
//$file->move('storage/app/public/products', $fileName);
//$product->image = $fileName ;
