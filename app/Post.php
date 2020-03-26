<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     public function user(){
        return $this->belongsTo('App\User');


     }

     public function getCreatedAtAttribute($value)
    {
       $carbon = new Carbon($value); 
        return  $carbon->toDateString();
    }
}
