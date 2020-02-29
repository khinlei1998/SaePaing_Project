<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotReport extends Model
{
    //
    protected $fillable = [
        'hot_person', 'status','hot_feedback','hot_report_desc','hot_report_attached_file','report_attached_file','assigntb_id'
    ];
}
