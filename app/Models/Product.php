<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_image',
        'product_name',
        'artist',
        'genre',
        'release_date',
        'price',
        'stock',
        'supplier_id'
    ];

    // Define the relationship
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
