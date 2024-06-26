<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discounts';

    protected $primaryKey = 'discount_id';

    protected $fillable = [
        'discount_name',
        'discount',
        'created_at',
        'updated_at'
    ];

    // Relationships
    // public function paymentTransactions()
    // {
    //     return $this->hasMany(PaymentTransaction::class, 'discount_id');
    // }
     // Relationships
     public function paymentTransactions()
     {
         return $this->hasMany(PaymentTransaction::class, 'discount_id', 'discount_id');
     }
 

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}