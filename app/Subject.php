<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function books(){
    	return $this->hasMany('App\Book');
    } 
}
