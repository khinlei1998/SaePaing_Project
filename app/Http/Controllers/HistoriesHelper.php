<?php

namespace App\Http\Controllers;

use App\Histories;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HistoriesHelper
{
    public function setnoti($sender_id, $receiver_id,$cbp_id,$project_id,$description,$read_this)
    {
        $created = Histories::create(['sender_id' => $sender_id,'project_id'=>$project_id,'cbp_id'=>$cbp_id,'read_this'=>$read_this,'receiver_id' => $receiver_id, 'description' => $description, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        return $created;
    }
}
