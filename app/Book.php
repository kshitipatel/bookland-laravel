<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
	use SoftDeletes;

	protected $fillable = [
		'student_name','student_id','semester','subject_id','book_name','author','price','contact','image','slug'
	];
	protected $dates = ['deleted_at'];
    public function subject(){
    	return $this->belongsTo('App\Subject');
    }
}
