<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'categories_id',
        'name',
        'price',
        'quantity',
        'img_path',
    ];
    public function user(): BelongsTo  
    {
        return $this->belongsTo(User::class);
    }
    public function order(): BelongsToMany  
    {
        return $this->belongsToMany(Order::class);
    }

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
