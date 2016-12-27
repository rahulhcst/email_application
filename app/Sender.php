<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sender extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'to_user_id');
    }
}
