<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Order extends Model
{
    use HasFactory;
    protected $table="orders";

    protected $casts = [
        'status' => OrderStatus::class,
    ];

    

    public function order_items(){
        return $this->hasMany(OrderItem::class);
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function delivery_address(){
        return $this->belongsTo(Delivery_Address::class);
    }
}
