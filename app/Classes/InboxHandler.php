<?php
/**
 * Created by PhpStorm.
 * User: Rahul Sharma
 * Date: 12/27/2016
 * Time: 12:55 PM
 */

namespace App\Classes;

use App\EmailRecord;
use App\User;
use Illuminate\Http\Request;

class InboxHandler
{
    private $user;
    private $request;
    public function __construct(User $user, Request $request)
    {
        $this->user = $user;
        $this->request = $request;
    }

    private function getEmailRecords($emailThread)
    {
        $emailRecords = $emailThread->emailRecord()->where('thread_id', $emailThread->id)->orderBy('id')->get();

        foreach ($emailRecords as $emailRecord)
        {
            if ($emailRecord->category_id == 1)
            {
                $sender = $emailRecord->senders()->get();
                if (!empty($sender))
                {
                    $user = $sender[0]->user()->first();
                    $emailRecord->sender['name'] = $user->name;
                    $emailRecord->sender['email'] = $user->email;
                }
            } elseif ($emailRecord->category_id == 1)
            {
                $receivers = $emailRecord->receivers()->get();
                if (!empty($receivers))
                {
                    foreach ($receivers as $receiver)
                    {
                        $user = $receiver->user()->first();
                        $emailRecord->receiver[]['name'] = $user->name;
                        $emailRecord->receiver[]['email'] = $user->email;
                    }
                }
            }

        }

    }

    private function getThreadMails($emailThread)
    {

    }

    private function getMailThread()
    {
        $inbox = [];
        //$emailThreads = $this->user->emailThread()->where('inbox', true)->orderBy('timsetamp', 'desc')->get();
        $emailThreads = $this->user->emailThread()->where('inbox', true)->orderBy('id')->get();
        if (!empty($emailThreads))
        {
            foreach ($emailThreads as $k => $emailThread)
            {
                //$emailThread->mails = [];
                $inbox[$k]['thread'] = $emailThread;
                $emailRecords = EmailRecord::where('thread_id', $emailThread->id)->orderBy('id')->get();
                //array_push($inbox, $emailRecords);
                //array_push($emailThread->mails, $emailRecords);
                //$emailThread->mails = $emailRecords;
                $inbox[$k]['mails'] = $emailRecords;
            }
        }/*else
            $emailThreads = [];*/
        return $inbox;
        //$emailThreads;
    }

    public function getMails()
    {
        return $this->getMailThread();
    }

}