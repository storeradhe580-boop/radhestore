<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_number',
        'email',
        'total_amount',
        'status',
        'order_status',
        'shipping_address',
        'shipping_city',
        'shipping_state',
        'shipping_pincode',
        'shipping_phone',
        'payment_method',
        'payment_id',
        'payment_status',
        'phone',
        'delivered_at',
        'transaction_id',
        'placed_at',
        'processing_at',
        'shipped_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
