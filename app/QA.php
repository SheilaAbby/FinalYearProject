<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QA extends Model
{
    //
    protected $fillable=[
        'lect_id','unit_code','stud_count','score','comments'
    ];
    protected $table='q_as';
}
