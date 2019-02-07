<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dependanttype extends Model
{
     protected $table = 'dependanttypes';
    protected $fillable = ['id','dependanttype','dependantdesc','created_at','updated_at'];
    protected $primaryKey='id';
}
