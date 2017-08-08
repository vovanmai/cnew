<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use SoftDeletes;
    protected $table='cat';
    protected $primaryKey='cid';
    public $timestamps=false;
    protected $dates = ['deleted_at'];	

     public function news(){
     	return $this->hasMany('App\Model\News','cid');
     }
     	
}
