<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
     protected $table = "users";
     public function catalogs(){
	   return $this->hasmany('App\transactions','user_id','id');
	 }
	 
}
