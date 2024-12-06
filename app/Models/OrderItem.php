<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class OrderItem extends Model
{
    public function Order(): BelongsToMany{
       return $this->belongsToMany(Order::class);
    }
}
