<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'status',
    ];

    /**
     * The user who placed the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The payment associated with this order.
     */
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    /**
     * Get all items in this order.
     * (Optional: If you implement a separate OrderItem model later)
     */
    // public function items()
    // {
    //     return $this->hasMany(OrderItem::class);
    // }
}
