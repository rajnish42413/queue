<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'username', 'email', 'role', 'password' ,'created_by','company'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function calls()
	{
		return $this->hasMany('App\Models\Call');
	}

	public function getRoleTextAttribute($value)
	{
		if($this->attributes['role']=='A') {
            return trans('messages.mainapp.role.Administrator');
         } elseif ( $this->attributes['role']=='VE') {
            return trans('messages.mainapp.role.Vendor').' '.'Employee';
         }elseif ( $this->attributes['role']=='SA') {
            return 'Super'.trans('messages.mainapp.role.Administrator');
         }

		return trans('messages.mainapp.role.Vendor').' '.'Employee'.' '.'Staff';
	}

    public function getIsAdminAttribute($value)
	{
		if($this->attributes['role']=='A') return true;

        return false;
	}

    public function getIsSuperAdminAttribute($value)
    {
        if($this->attributes['role']=='SA') return true;

        return false;
    }

    public function getIsVendorEmployeeAttribute($value)
    {
        if($this->attributes['role']=='VE') return true;

        return false;
    }

    public function getIsVendorEmployeeStaffAttribute($value)
    {
        if($this->attributes['role']=='S') return true;

        return false;
    }

  




}
