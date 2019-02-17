<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CsvData extends Model
{
    protected $table = 'csv_data';
    protected $fillable = ['id','csv_filename','csv_header','csv_data','created_at','updated_at'];
      protected $primaryKey='id';
}
