<?php

namespace App;
use CpbList;
use Illuminate\Database\Eloquent\Model;

class CbpSubtask extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = ['cbp_subtask','cbp_id'];

    public function cbplist(){
        return $this->belongsTo(CbpList::class,'cbp_id','id');
    }
}
