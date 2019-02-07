<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dependant extends Model
{
    protected $table = 'dependants';
    protected $fillable = ['fullname','employee_id','deptypeid','sex','email','dob','phone','nextofkeen'];
    protected $primaryKey='id';
}
