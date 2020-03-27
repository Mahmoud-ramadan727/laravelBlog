<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
   use Sluggable;
     public function user(){
        return $this->belongsTo('App\User');


     }

     public function getCreatedAtAttribute($value)
    {
       $carbon = new Carbon($value); 
        return  $carbon->toDateString();
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
   }
}
