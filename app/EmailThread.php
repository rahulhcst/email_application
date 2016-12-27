<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailThread extends Model
{
    protected $guarded = [];

    public $table = 'email_thread';

    public function emailRecords()
    {
        return $this->hasMany(EmailRecord::class, 'thread_id', 'id');
    }
}
