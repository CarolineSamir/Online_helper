<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\Component;

class Product extends Component
{
    protected $listeners = ['refreshCategory' => '$refresh'];
    public $products = null ;
    public $categories = null ;
    public $edit = null;
    public $cat_id = null ;
    public $err = null ;
    public $name;


    public function delete($id){

        $product = \App\Models\Product::where('category_id', $id)->first();
        if($product) {
            $this->err =  'sorry the category has products, It cannot be deleted';
        }else{
            $category = Category::find($id);
            $category->delete();
//            session()->flash('message', 'Post successfully updated.');
        }
    }



    public function viewProduct($id){
        $this->cat_id = $id ;
        $this->products = \App\Models\Product::where('category_id', $id)->get();
    }


    public function refresh() {
        return redirect()->to(route('category-index'));
    }

    public function render()
    {

        $this->categories = Category::get();

        if ($this->products == null && $this->categories->count() > 0 ){
            $this->viewProduct($this->categories->first()->id);
        }
        return view('livewire.product');
    }

}
