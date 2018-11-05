<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $primaryKey='id';
    protected $table = 'years';
    protected $fillable = ['year'];
}
