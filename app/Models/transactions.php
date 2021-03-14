<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
     protected $table = "transactions";
     public function catalogs(){
	   	return $this->hasMany('App\order_details','transaction_id','id');
	 }

	 public function users(){
	   return $this->belongsTo('App\users','user_id','id');
	 }
	 
}
