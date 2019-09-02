<?php

namespace App\Repositories;


use App\Models\User;
use Auth;

class UserRepository
{
    public function getAll()
    {
        $role = Auth::user()->role;
        $company = Auth::user()->company;

        if ($role == 'SA') {
          return User::all();
        } else {
          return User::where('company',$company )
                  ->get();
        }
    }
}
