<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectConfig extends Model
{
    protected $fillable = [
        'cbp_id', 'cbp_subtask', 'status','project_id','assign_person','d_line','percent','user_id'
    ];

    public function CBPlist(){
        return $this->belongsTo(CbpList::class,'cbp_id');
    }
    public function cbpHod(){
        return $this->belongsTo(Employee::class,'assign_person');
    }

    public function hodReport(){
        return $this->hasMany(HodReport::class,'projConfig_id');
    }

    public function getCbpSubListsAttribute(){
        $cbpsubtasks = $this->cbp_subtask;
        $cbpsubtasks = explode(',',$cbpsubtasks);
        $result = array();
        foreach ($cbpsubtasks as $cbpsubtask){//11,12,13
            
            $subtask = CBPSubtask::find($cbpsubtask)->toArray();
            $hot = AssignToHot::where('cbp_id',$subtask['cbp_id'])->where('cbp_subtask_id',$subtask['id'])->where('project_id',$this->project_id)->select('hot_id','status')->first();
            $newhot=new AssignToHot();
            if ($hot) {
                $newhot->hot_id = $hot->hot->emp_name;
                $newhot->status = $this->getStatus($hot->status);
            }else{
                $newhot->hot_id = "UNSIGNED!";
                $newhot->status = "bg-warning";
            }
            array_push($result,array_merge($subtask,$cbpsubtasks,$newhot->toArray()));
        }
        return $result;
    }
    public function getStatus($status){
        switch($status){
            case '0':return "start";
            case '1':return "assign";
            case '2':return "complete";
        }
    }
    public function Assigntohots(){
        return $this->hasmany(ProjectConfig::class,'cbp_id');
    }
}
