<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function email()
    {
        return $this->hasMany(Email::class, 'userid', 'id');
    }

    public function emailRecord()
    {
        return $this->hasMany(EmailRecord::class, 'user_id', 'id');
    }

    public function senderEmailRecord()
    {
        return $this->hasMany(EmailRecord::class, 'senderid', 'id');
    }
}
