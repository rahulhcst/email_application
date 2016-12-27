<?php
/**
 * Created by PhpStorm.
 * User: Rahul Sharma
 * Date: 12/27/2016
 * Time: 9:04 AM
 */

namespace App\Claases;

use App\Sender;
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
        Sender::create([
            'from_user_id' => $emailRecord->id,
            'timestamp' => time()
        ]);
    }

    private function insertInEmailThread($mailParams)
    {
        $emailThread = $this->user->emailThread()->create([
            'subject' => $mailParams['subject'],
            'timestamp' => time(),
            'inbox' => true
        ]);

        return $emailThread;
    }

    private function insertInEmailRecord($mailParams)
    {
        $emailRecord = $this->user->emailRecord()->create([
            'thread_id' => $mailParams['id'],
            'subject' => $mailParams['subject'],
            'category_id' => 1,
            'mail_body' => $mailParams['mail_body'],
            'attachment' => false,
            'references' => $mailParams['id'],
            'timestamp' => time(),
            'inbox' => true
        ]);

        return $emailRecord;
    }

    public function handleIncomingMail($mailParams)
    {
        $emailThread = $this->insertInEmailThread($mailParams);

        if (is_object($emailThread))
            $emailRecord = $this->insertInEmailRecord($mailParams);

        if (is_object($emailRecord))
        {
            $this->receive($emailRecord);
        }
    }
}