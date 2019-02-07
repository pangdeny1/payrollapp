<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prlothintransaction extends Model
{
    protected $table = 'prlothintransactions';
    protected $fillable = ['id','payroll_id','employee_id','othinc_id','taxable','amount','creator_id','created_at','updated_at'];
    protected $primaryKey='id';

        public function incometype()
    {
       return $this->belongsTo("App\Models\Plothinctype","othinc_id");

    }
}
