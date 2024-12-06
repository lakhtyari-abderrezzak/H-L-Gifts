<?php

namespace App\Policies;

use App\Models\Auth;
use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DashboardPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function enter(User $user){
        return $user->name === 'helen';
   }
}
