<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'order_number',
        'total',
        'user_id',
        'payment_type',
        'name',
        'phone',
        'division',
        'district',
        'sub_district',
        'address',
        'zipcode',
        'order_status',
    ];
    protected $with = ['orderItems'];
    public function orderItems(){
        return $this->hasMany(OrderItem::class,'order_id','id');
    }

}
