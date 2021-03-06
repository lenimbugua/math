<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $dispatchesEvents = [
        'created'=> Events\NewOrder::class,
        'updated'=>Events\OrderEdited::class,
    ];
    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function files(){
        return $this->hasMany('App\File');
    }
    public function messages(){
        return $this->hasMany('App\Message');
    }
    public function revisions(){
        return $this->hasMany('App\Revision');
    }
}
