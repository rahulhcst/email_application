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
        //$emailRecords = $emailThread->emailRecord()->where('thread_id', $emailThread->id)->orderBy('id')->get();
        $emailRecords = $emailThread->emailRecords()->orderBy('id')->get();

        foreach ($emailRecords as $emailRecord)
        {
            var_dump($emailRecord->category_id);
            if ($emailRecord->category_id == 1)
            {
                $sender = $emailRecord->senders()->get();

                //var_dump(empty($sender));
                //var_dump(count($sender));die();
                if(count($sender))//if (!empty($sender))
                {
                    //var_dump($sender);
                    $user = $sender[0]->user()->first();
                    if ($user)
                    {
                        $senderDetails = [];
                        $emailRecord->sender = [];
                        $senderDetails['name'] = $user->name;
                        $senderDetails['email'] = $user->email;
                        $emailRecord->sender = $senderDetails;
                    }
                }
            } elseif ($emailRecord->category_id == 2)
            {
                $receivers = $emailRecord->receivers()->get();
                if (!empty($receivers))
                {
                    $receiverDetails = [];
                    foreach ($receivers as $receiver)
                    {
                        $user = $receiver->user()->first();
                        if ($user)
                            $receiverDetails[] = ['name' => $user->name, 'email' => $user->email];
                    }
                    $emailRecord->receivers = $receiverDetails;
                }
            }

        }
        return $emailRecords;
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
                $inbox[$k]['thread'] = $emailThread;
                //$emailRecords = EmailRecord::where('thread_id', $emailThread->id)->orderBy('id')->get();
                $emailRecords = $this->getEmailRecords($emailThread);
                $inbox[$k]['mails'] = $emailRecords;
            }
        }
        return $inbox;
    }

    public function getMails()
    {
        return $this->getMailThread();
    }

}