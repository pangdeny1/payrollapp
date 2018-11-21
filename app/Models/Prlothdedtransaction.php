<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prlothdedtransaction extends Model
{
   
    protected $table = 'prlothdedtransactions';
    protected $fillable = ['payroll_id','employee_id','otherinc_id','amount'];
    protected $primaryKey='id';

        public function deductiontype()
    {
        return $this->belongsTo("App\Models\Prlothdedctypes","othded_id");
    }
}
