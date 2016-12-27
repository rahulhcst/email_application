<?php
/**
 * Created by PhpStorm.
 * User: Rahul Sharma
 * Date: 12/27/2016
 * Time: 6:07 PM
 */

namespace App\Claases;


use App\EmailThread;
use App\User;
use Illuminate\Http\Request;

class ReplyMailHandler
{
    private $user;
    private $request;

    public function __construct(User $user, Request $request)
    {
        $this->user = $user;
        $this->request = $request;
    }

    private function updateEmailThread()
    {
        EmailThread::where('id', $this->request->input('thread_id'))->update('sent', true);
    }

    public function replyMail()
    {

    }
}