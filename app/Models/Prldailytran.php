<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prldailytran extends Model
{
   protected $primaryKey="id";

   protected $table="prldailytrans";

   protected $guarded = [];
   protected $fillable = ["id","employee_id","rtref","rtdesc","rtdate","payroll_id","reg_hours","absenthrs","latehrs","regamt","absentamt","lateamt","approved","verified","approver","verifyer","creator_id","created_at","updated_at"];
}
