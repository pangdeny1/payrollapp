<?php

namespace App\Models\leave;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Leave extends Model
{


    protected $guarded = [];
        protected $fillable = [
          
           'id','start_date','end_date','working_days','holiday_days','total_days','leavetype_id','employee_id','reason_for_leave','user_id','manager_id','status','reason_for_rejection','creator_id','created_at'
       
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
