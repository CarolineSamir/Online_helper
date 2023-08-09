<?php

namespace App\Http\Livewire;

use App\Models\Country;
use Livewire\Component;

class CountryWire extends Component
{
    protected $listeners = ['refreshCountry' => '$refresh'];
    public $countries = null;
    public $cities = null;
    public $country_id = null;

    public function viewCity($id){
        $this->country_id = $id;
        $this->cities = Country::where('sub_of',$id)->get();
    }

    public function refresh() {
        return redirect()->to(route('country-index'));
    }

    public function render()
    {
        $this->countries = Country::where('sub_of', '0')->get();
        if($this->cities == null && $this->countries->count() > 0){
            $this->viewCity($this->countries->first()->id);
        }
        return view('livewire.country-wire');
    }
}
