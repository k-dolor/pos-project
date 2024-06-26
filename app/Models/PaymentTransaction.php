<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    use HasFactory;

    protected $table = 'payment_transactions';

    protected $primaryKey = 'transaction_id';

    protected $fillable = [
        'user_id',
        'payment_method_id',
        'discount_id',
        'created_at',
        'updated_at'
    ];

    // Relationships
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // public function paymentMethod()
    // {
    //     return $this->belongsTo(PaymentMethod::class);
    // }

    // public function discount()
    // {
    //     return $this->belongsTo(Discount::class);
    // }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id', 'payment_method_id');
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class, 'discount_id', 'discount_id');
    }
}


