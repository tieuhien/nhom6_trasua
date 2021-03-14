<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
	{
	   protected $table = "products";
	   public function catalogs(){
			return $this->belongsTo('App\catalogs','catalog_id','id');
	}
	   public function products(){
	  		return $this->hasMany('App\order_details','product_id','id');
	}
}
