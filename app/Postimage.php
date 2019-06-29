<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postimage extends Model
{
    public function user(){
        return $this->belongsTo('App\User')->select('id','name');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
