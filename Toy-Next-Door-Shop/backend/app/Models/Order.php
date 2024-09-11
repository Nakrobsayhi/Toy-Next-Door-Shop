<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'orders_id';

    public function pro() 
    {
        return $this->belongsTo(Product::class, 'product_id');  
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
