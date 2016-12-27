<?php

namespace App\Http\Controllers;

use App\Classes\InboxHandler;
use App\Email;
use App\User;
use Illuminate\Http\Request;

class InboxController extends Controller
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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function showAll(Request $request)
    {
        //$records = $request->user()->emailRecord()->where('category_id', 1)->get();

        //var_dump($records);
        $mails = [];

        $ih = new InboxHandler($request->user(), $request);
        $mails = $ih->getMails();

        /*if (!empty($records))
        {
            foreach ($records as $record)
            {
                $emailRecord = Email::find($record->email_id);
                if (!empty($emailRecord))
                {
                    $mail['id'] = $emailRecord->id;
                    $mail['subject'] = $emailRecord->subject;
                    //$mail['body'] = htmlspecialchars($emailRecord->body);
                    $mail['body'] = nl2br($emailRecord->body);
                    $user = User::find($emailRecord->userid);
                    $mail['name'] = $user->name;
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
