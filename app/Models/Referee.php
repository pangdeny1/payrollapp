<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Referee extends Model
{
   protected $table = 'referees';
    protected $fillable = ['id','full_name','title','company','email','phone','website','address','created_at','updated_at'];
    protected $primaryKey='id';
}

