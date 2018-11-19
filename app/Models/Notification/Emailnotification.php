<?php

namespace App\Models\Notification;

use Illuminate\Database\Eloquent\Model;

class Emailnotification extends Model
{
     protected $guarded = [];
        protected $fillable = [
          
          'id','sender','sendto','sendto_email','url','body','module','notification_type','creator_id','request_id','created_at','updated_at'
       
    ];

}
