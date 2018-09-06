<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Current extends Model
{
    //
    protected $fillable=['
    unit_code','lect_number'];
    public  function lectures(){
        return $this->belongsTo('App/Lectures');
    }
}
