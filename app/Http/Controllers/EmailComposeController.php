<?php

namespace App\Http\Controllers;

use App\Claases\IncomingMailHandler;
use App\EmailMapper;
use App\EmailRecord;
use App\Receiver;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\Flysystem\Exception;

class EmailComposeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $isCreated = $request->user()->email_thread()->create(['timestamp' => time()]);
        if (is_object($isCreated))
            return response()->json($isCreated);
        return response('error', 500);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    private function getUserId($email)
    {
        $user = User::where('email', $email)->first();
        if (!empty($user))
            return $user->id;
        return false;
    }

    //private function

    private function insertEmailRecord($emailId, $receiver)
    {
        $receiverId = $this->getUserId($receiver);

        if ($receiverId)
        {
            $handler = new IncomingMailHandler($receiverId);
            Receiver::create(['to_user_id' => $receiverId, 'timestamp' => time()]);
            $handler->handleIncomingMail($emailId);
        }

        die;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, $id)
    {
        $email = $request->user()->email()->find($id);
        $email->timestamp = time();
        //$email->subject = htmlspecialchars($request->input('subject'));
        $email->subject = $request->input('subject');
        $email->body = $request->input('body');
        //$email->attachment = $request->input('attachment');
        $email->save();
        EmailRecord::create(['email_id' => $email->id, 'user_id' => $request->user()->id, 'category_id' => 2, 'timestamp' => time()]);

        //EmailMapper::create(['email_recordid' => 1]);
        $receivers = $request->input('receivers');
        foreach ($receivers as $receiver){
            $this->insertEmailRecord($id, $receiver);
        }
    }*/

    public function update(Request $request, $id)
    {
        $emailThread = $request->user()->emailThread()->find($id);
        //$email->subject = htmlspecialchars($request->input('subject'));
        $emailThread->subject = $request->input('subject');
        //$email->attachment = $request->input('attachment');
        $emailThread->timestamp = time();
        $emailThread->sent = true;
        $emailThread->save();
        $emailRecordSender = $request->user()->emailRecord()->create(['thread_id' => $emailThread->id,
            'category_id' => 2,
            'mail_body' => $request->input('mail_body'),
            'attachment' => false,
            'timestamp' => time()
        ]);
        //EmailRecord::create(['email_id' => $email->id, 'user_id' => $request->user()->id, 'category_id' => 2, 'timestamp' => time()]);

        $receivers = $request->input('receivers');
        foreach ($receivers as $receiver){
            $this->insertEmailRecord($id, $receiver);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
