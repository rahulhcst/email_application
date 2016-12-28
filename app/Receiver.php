<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{
    protected $guarded = [];

    public function user()
    {
        //return $this->belongsTo(User::class, 'id', 'from_receiver_id');
        return $this->hasOne(User::class, 'id', 'to_user_id');
    }
}
