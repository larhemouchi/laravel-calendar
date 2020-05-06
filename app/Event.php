<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = ['title','nom_service','start_date','end_date'];

    public function getRouteKeyName(){
        return 'title';
    }

}
