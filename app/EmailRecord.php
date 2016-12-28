<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailRecord extends Model
{
    public $table = 'email_records';

    protected $guarded = [];

    public function senders()
    {
        return $this->hasOne(Sender::class, 'record_id', 'id');
    }

    public function receivers()
    {
        return $this->hasMany(Receiver::class, 'record_id', 'id');
    }
}
