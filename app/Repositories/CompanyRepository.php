<?php

namespace App\Repositories;


use App\Models\Company;
use Auth;

class CompanyRepository
{
    public function getAll()
    {
       return Company::all();
    }
}
