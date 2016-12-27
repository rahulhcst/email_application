<?php
/**
 * Created by PhpStorm.
 * User: Rahul Sharma
 * Date: 12/27/2016
 * Time: 9:04 AM
 */

namespace App\Claases;

use App\Receiver;
use App\User;

class IncomingMailHandler
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    private function receive($emailRecord)
    {
        Receiver::create([
            'from_user_id' => $emailRecord->id,
            'timestamp' => time()
        ]);
    }

    public function handleIncomingMail($mailParams)
    {
        $emailRecord = $this->user->emailRecord()->create([
            'subject' => $mailParams['subject'],
            'refernces' => $mailParams['id'],
            'timestamp' => time(),
            'inbox' => true
        ]);

        if (is_object($emailRecord))
        {
            $this->receive($emailRecord);
        }
    }
}