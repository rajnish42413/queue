<?php

namespace App\Repositories;

use App\Models\Language;
use App\Models\Setting;
use App\Models\User;
use Auth;

class SettingsRepository
{
    public function getLanguages()
    {
        return Language::all();
    }

    public function getSettings()
    {
    	 $company = Auth::user()->company;
         $role = Auth::user()->role;
         if ($role =='SA') {
            return Setting::all();
         } else{
    	  return Setting::where('id', $company)
    	 					->get();
         }
    }

    public function getSetting()
    {
         $company = Auth::user()->company;
          return Setting::where('id', $company)->first();

    }


}
