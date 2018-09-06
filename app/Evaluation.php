<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{

    //
  protected $fillable=[
      'user_id','u_code','lect_id','presentation','subject_matter','personal_attributes','score'];
}
