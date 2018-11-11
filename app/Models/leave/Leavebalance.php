<?php

namespace App\Models\leave;

use Illuminate\Database\Eloquent\Model;

class Leavebalance extends Model
{
        protected $guarded = [];
        protected $fillable = [
          
           'id','start_date','end_date','days','employee_id','reason_for_leave','user_id','manager_id','status','creator_id','created_at'
       
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
