<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Histories extends Model
{
    //
    protected $fillable=['sender_id','receiver_id','description','for_id'];
}
