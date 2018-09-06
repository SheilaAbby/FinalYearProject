<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lectures extends Model
{
    //
    protected $fillable=['
    name','lect_number'];
    public function lect_units(){
        return $this->hasMany('App\Lect_Units');
    }
}
