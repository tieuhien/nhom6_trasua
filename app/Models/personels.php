<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personels extends Model
{
     protected $table = "personels";
     public function transactions(){
	   return $this->belongsTo('App\transactions','transaction_id','id');
	 }
}
