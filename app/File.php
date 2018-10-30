<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function order(){
    	return $this->belongsTo('App\Order');
    }
    public function revision(){
    	return $this->belongsTo('App\Revision');
    }
}
