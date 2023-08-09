<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    public function shippingCompany(){
        return $this->hasOne(ShippingCompany::class, 'id', 'shipping_company_id');
    }
    public function order(){
        return $this->hasOne(Order::class, 'id', 'order_id');
    }

    public function country(){
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
}
