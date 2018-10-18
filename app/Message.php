<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $fillable =[
		'message'
	];
    public function order(){
    	return $this->belongsTo('App\Order');
    }
    public function user(){
    	return $this->belongsTo('App\User');
    }
    
}
