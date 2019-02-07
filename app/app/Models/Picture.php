<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class Picture extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $guarded = [];
    protected $fillable = ['id','name','pic','pictureable_type','pictureable_id','creator_id','created_at','updated_at'];
}
