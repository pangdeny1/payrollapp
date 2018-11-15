<?php

namespace App\Models\leave;

use Illuminate\Database\Eloquent\Model;

class leaveEmployeeApprover extends Model
{
      public function employee()
    {
        return $this->belongsTo("\App\Employee","employee_id");
    }
}
