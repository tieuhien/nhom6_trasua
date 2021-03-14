<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{
     protected $table = "order_details";
     
     public function products(){
	 	return $this->belongsTo('App\products','product_id','id');
	 }
	 
	 public function transactions(){
	 	return $this->belongsTo('App\transactions','transaction_id','id');
	 }
}
