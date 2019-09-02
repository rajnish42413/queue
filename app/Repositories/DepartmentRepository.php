<?php

namespace App\Repositories;

use App\Models\Department;
use Auth;

class DepartmentRepository
{
    public function getAll()
    {
    	$role = Auth::user()->role;
        $company = Auth::user()->company;

        if ($role == 'SA') {
          return Department::all();
        } else {
          return Department::where('company',$company )
                  ->get();
        }
    }
}
