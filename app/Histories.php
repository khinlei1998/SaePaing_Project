<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Histories extends Model
{
    //
    protected $fillable=['sender_id','receiver_id','description','read_this','project_id','cbp_id'];
}
