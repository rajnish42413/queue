<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'letter', 'start','vendor','company'];

    public function queues()
	{
		return $this->hasMany('App\Models\Queue');
	}

    public function calls()
	{
		return $this->hasMany('App\Models\Call');
	}
}
