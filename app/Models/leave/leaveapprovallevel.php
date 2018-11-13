<?php

namespace App\Models\leave;

use Illuminate\Database\Eloquent\Model;

class leaveapprovallevel extends Model
{
    
    protected $guarded = [];
        protected $fillable = [
          
           'id','name','desctription','priority','creator_id','created_at'
       
    ];
}
