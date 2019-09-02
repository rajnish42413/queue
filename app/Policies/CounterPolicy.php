<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Counter;

class CounterPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function access(User $user)
    {
         if($user->role=='A') {
            return true;
        } elseif ($user->role=='SA') {
            return true; 
        }elseif ($user->role=='VE') {
            return true; 
        }
    }
}
