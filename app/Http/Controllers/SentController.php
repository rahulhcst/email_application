<?php

namespace App\Http\Controllers;

use App\Classes\SentHandler;
use App\Email;
use App\EmailRecord;
use App\User;
use Illuminate\Http\Request;

class SentController extends Controller
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
    public function create()
    {
        //
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
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAll(Request $request)
    {
        //$records = $request->user()->emailRecord()->where('category_id', 2)->get();

        $mails = [];
        $sh = new SentHandler($request->user(), $request);
        $mails = $sh->getMails();


        /*if (!empty($records))
        {
            foreach ($records as $record)
            {
                $emailRecord = Email::find($record->email_id);
                $sentUsers = EmailRecord::where(['email_id' => $record->email_id, 'category_id' => 1]);
                if (!empty($emailRecord))
                {
                    /*var_dump($emailRecord);
                    die;*\/
                    
                    $mail['id'] = $emailRecord->id;
                    $mail['subject'] = $emailRecord->subject;
                    //$mail['body'] = htmlspecialchars($emailRecord->body);
                    $mail['body'] = nl2br($emailRecord->body);
                    //$user = User::find($emailRecord->userid);
                    //$user = User::find($record->user_id);
                    //$mail['name'] = $user->name;
                    $mail['name'] = $record->email_id;
                    $mail['time'] = $emailRecord->updated_at;
                    array_push($mails, $mail);
                }
            }
        }*/
        return response()->json($mails);
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
