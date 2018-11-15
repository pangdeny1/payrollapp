<?php

namespace App\Models\leave;

use Illuminate\Database\Eloquent\Model;

class leaveEmployeeApprover extends Model
{
	  protected $guarded = [];
        protected $fillable = [
          
           'id','approver_id','approver','employee_id','leavetype_id','level_id','active','creator_id','created_at','updated_at'
       
    ];
    
      public function employee()
    {
        return $this->belongsTo("\App\Employee","employee_id");
    }
      public function leavetype()
    {
        return $this->belongsTo("App\Models\Leave\Leavetype","leavetype_id");
    }
}
