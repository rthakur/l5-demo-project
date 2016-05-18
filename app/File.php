<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SoftDeletes;
    protected $table="files";
    protected $guarded=array();
    protected $dates = ['deleted_at'];


    public function user(){
           return $this->belongsTo('App\User');
    }
}
