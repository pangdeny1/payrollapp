<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{

    protected $primaryKey='id';

  protected $table='salaries';
    protected $fillable = [
          
          'employee_id','salaryfrom','salaryto','changedby','changedamount','percentage','payroll_id','datechanged'
           ];

              public function employee()
    {
        return $this->belongsTo("\App\Employee","employee_id");
    }

}
