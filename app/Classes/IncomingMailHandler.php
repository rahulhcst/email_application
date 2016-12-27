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
use Illuminate\Http\Request;

class IncomingMailHandler
{
    private $user;
    private $request;

    public function __construct(User $user, Request $request)
    {
        $this->user = $user;
        $this->request = $request;
    }

    private function sender($emailRecord)
    {
        Sender::create([
            'record_id' => $emailRecord->id,
            'from_user_id' => $emailRecord->id,
            'timestamp' => time()
        ]);
    }

    private function insertInEmailThread($mailParams)
    {
        $emailThread = $this->user->emailThread()->create([
            'subject' => $this->request->input('subject'),
            'timestamp' => time(),
            'inbox' => true
        ]);
        return $emailThread;
    }

    private function insertInEmailRecord($mailParams, $emailThread)
    {
        $emailRecord = $this->user->emailRecord()->create([
            'thread_id' => $emailThread->id,
            'category_id' => 1,
            'references' => $this->request->references,
            'mail_body' => $this->request->input('mail_body'),
            'attachment' => false,
            'timestamp' => time(),
        ]);
        return $emailRecord;
    }

    public function handleIncomingMail($mailParams = false)
    {
        $emailThread = $this->insertInEmailThread($mailParams);

        $emailRecord = false;

        if (is_object($emailThread))
            $emailRecord = $this->insertInEmailRecord($mailParams, $emailThread);

        if (is_object($emailRecord))
        {
            $this->sender($emailRecord);
        }
    }
}