<?php

namespace App\Models\leave;

use Illuminate\Database\Eloquent\Model;

class leaveapproval extends Model
{
   
    protected $guarded = [];
        protected $fillable = [
          
           'id','request_id','approver','approver_id','priority','action_type','leavetype_id','employee_id','action_by','creator_id','comment','created_at','updated_at'
       
    ];

      public function employee()
    {
        return $this->belongsTo("\App\Employee","employee_id");
    }


     public function approvername()
    {
        return $this->belongsTo("\App\Employee","approver");
    }

       public function leavetype()
    {
        return $this->belongsTo("App\Models\Leave\Leavetype","leavetype_id");
    }

       public function approverlevel()
    {
        return $this->belongsTo("App\Models\Leave\leaveapprovallevel","level_id");
    }
}
