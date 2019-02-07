<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
     protected $primaryKey='id';
     protected $table = 'banks';


         public function employee()
{
    return $this->hasMany(Employee::class);
}
}
