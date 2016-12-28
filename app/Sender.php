<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sender extends Model
{
    protected $guarded = [];

    public function user()
    {
        //return $this->belongsTo(User::class, 'id','','to_user_id');
        //return $this->belongsTo(User::class, 'id', 'to_user_id');
        //return $this->belongsTo(User::class, 'from_user_id', 'id');
        //return $this->belongsTo(User::class, 'id', '', 'from_user_id');
        return $this->hasOne(User::class, 'id', 'from_user_id');
    }
}
