<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prlothinctype extends Model
{
	protected $table = 'prlothinctypes';
    protected $fillable = ['id','incomedesc','othincdesc','taxable','appearoninvoice','accountcode','active','creator_id','created_at','updated_at'];
}
