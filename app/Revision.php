<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
	protected $fillable = [
        'instructions',
        'revision_count',
        'order_id'
    ];

    public function order(){
    	return $this->belongsTo('App\Order');
    }
    public function files(){
        return $this->hasMany('App\File');
    }
}
