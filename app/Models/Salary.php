<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{

    protected $primaryKey='id';

  protected $table='salaries';
    protected $fillable = [
          
          'id','employee_id','salaryfrom','salaryto','changedby','changedamount','percentage','payroll_id','datechanged','creator_id'
           ];

              public function employees()
    {
        return $this->belongsTo("\App\Employee","employee_id");
    }

}
