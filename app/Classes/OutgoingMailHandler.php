<?php
/**
 * Created by PhpStorm.
 * User: Rahul Sharma
 * Date: 12/27/2016
 * Time: 9:20 AM
 */

namespace App\Classes;
 use App\EmailThread;
 use App\Receiver;
 use App\User;
 use Illuminate\Http\Request;

 class OutgoingMailHandler
 {
     private $user;
     private $request;

     public function __construct(User $user, Request $request)
     {
         $this->user = $user;
         $this->request = $request;
     }

     private function insertReceivers($emailRecordId, $userId)
     {
         Receiver::create([
             'record_id' => $emailRecordId->id,
             'to_user_id' => $userId,
             'timestamp' => time()
         ]);
     }

     private function insertInEmailRecord(EmailThread $emailThread)
     {
         $emailRecord = $this->user->emailRecord()->create([
             'thread_id' => $emailThread->id,
             'category_id' => 2,
             'mail_body' => $this->request->input('body'),
             'attachment' => false,
             'timestamp' => time()
         ]);

         if (is_object($emailRecord))
             return $emailRecord;

         return false;
     }

     private function insertInEmailThread()
     {

     }

     private function updateEmailThread($id)
     {
         $emailThread = $this->user->emailThread()->find($id);

         if (!empty($emailThread))
         {
             $this->request->references_id = $emailThread->id;
             //$email->subject = htmlspecialchars($request->input('subject'));
             $emailThread->subject = $this->request->input('subject');
             //$email->attachment = $request->input('attachment');
             $emailThread->timestamp = time();
             $emailThread->sent = true;
             $emailThread->save();
             return $emailThread;
         }

         return false;
     }

     public function handleOutgoingMail($id)
     {
         $emailThread = $this->updateEmailThread($id);
         if ($emailThread)
         {
             $emailRecord = $this->insertInEmailRecord($emailThread);
             if ($emailRecord)
             {
                 $receivers = $this->request->input('receivers');
                 if (!empty($receivers))
                 {
                     foreach ($receivers as $receiver)
                     {
                         $receiverId = User::where('email', $receiver)->first();
                         $this->insertReceivers($emailRecord, $receiverId->id);
                     }
                 }
             }
         }
     }
 }