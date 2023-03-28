<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'quantity'
    ];
    public function deliveries(): HasMany
    {
        return $this->hasMany(Deliver::class, 'product_id', 'id');
    }
}
