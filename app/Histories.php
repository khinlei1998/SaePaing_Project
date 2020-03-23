<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Histories extends Model
{
    //
    protected $table='histories';
    protected $fillable=['sender_id','receiver_id','description','read_this','project_id','cbp_id','link_name'];
    // public function getDateFormat()
    // {
    //     return 'Y-m-d H:i:s.u';
    // }
    // public function getHumanDateAttribute()
    // {
    //     $hd= Carbon::parse($this->created_at)->isoFormat('DD. MMMM YYYY');
    //     return $this->attributes['human_date'] == $hd;
    // }
}
