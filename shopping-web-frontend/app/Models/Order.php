<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $guarded=[];
    protected $casts = [
        'status' => OrderStatus::class,
    ];
    public function deliveryAddress(){
        return $this->belongsTo(DeliveryAddress::class);
    }
    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
