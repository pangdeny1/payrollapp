<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Prldailytran extends Model
{
	 //use \OwenIt\Auditing\Auditable;
   protected $primaryKey="id";

   protected $table="prldailytrans";

   protected $guarded = [];

}
