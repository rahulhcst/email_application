<?php

namespace App\Http\Controllers;

use App\EmailMapper;
use App\EmailRecord;
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
        $isCreated = $request->user()->email()->create(['timestamp' => time()]);
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

    private function insertEmailRecord(Request $request, $receiver)
    {
        $receiverId = $this->getUserId($receiver);
        if ($receiverId)
        {
            $isCreated = $request->user()->senderEmailRecord->create([
                'mailid' => $request->input('id'),
                'receiverid' => $receiverId,
            ]);

            if (is_object($isCreated))
            {
                EmailMapper::create(['email_recordid' => $isCreated->id, 'userid' => $receiverId, 'categoryid' => 1, 'timestamp' => time()]);
            }

            return true;
        }
        return false;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $email = $request->user()->email()->find($id);
        $email->time = time();
        $email->subject = $request->input('subject');
        $email->body = $request->input('body');
        //$email->attachment = $request->input('attachment');
        $email->save();
        EmailRecord::create(['mailid' => $email->id, 'userid' => $request->user()->id, 'category' => 2]);

        //EmailMapper::create(['email_recordid' => 1]);
        $receivers = explode(',', $request->input('receivers'));
        foreach ($receivers as $receiver){

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
