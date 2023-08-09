<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Livewire\Component;

class CustomerOrders extends Component
{
    protected $listeners = ['refreshCustomers' => '$refresh'];
    public $customers = null ;
    public $orders = null ;
    public $error = null ;

    public function viewProduct($id){

        $this->orders = Order::where('customer_id', $id)->get();
    }

    function delete($id){
        $order = Order::where('customer_id', $id)->first();
        if($order){
            $this->error = 'customer has orders it can not be deleted';
        }
        else {
            $customer = Customer::find($id);
            $customer->delete();
        }

    }

    public function refresh() {
       return redirect()->to(route('customer-index'));
    }
    public function render()
    {
        $this->customers = Customer::get();
        if ($this->orders == null && $this->customers->count() > 0 ){
            $this->viewProduct($this->customers->first()->id);
        }
        return view('livewire.customer-orders');
    }
}
