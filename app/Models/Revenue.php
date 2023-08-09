<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }

    public function company(){
        return $this->hasOne(ShippingCompany::class, 'id', 'company_id');
    }
}
