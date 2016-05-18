<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
   use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function role(){
      return $this->belongsTo('App\Role','role_id','id');
    }

    public function createBy(){
      $getUser = $this->find($this->entry_by);
      return ($getUser)? $getUser->name : '';
    }

    protected $dates = ['deleted_at'];
}
