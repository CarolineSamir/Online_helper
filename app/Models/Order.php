<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function customer(){
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }

    public function shipment(){
        return $this->hasMany(Shipment::class, 'order_id', 'id');
    }
}
