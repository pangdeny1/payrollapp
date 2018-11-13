<?php

namespace App\Models\leave;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class leaveapprover extends Model
{


    protected $guarded = [];
        protected $fillable = [
          
           'id','approver','creator_id','created_at'
       
    ];
    
     public function employee()
    {
        return $this->belongsTo("\App\Employee","employee_id");
    }


     public function approvername()
    {
        return $this->belongsTo("\App\Employee","approver");
    }
}
