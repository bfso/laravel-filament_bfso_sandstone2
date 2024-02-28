<?php

namespace App\Http\Controllers;

use App\Models\Mail as MailModal;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\ActivitiesDue;
use Illuminate\Support\Facades\DB;


class MailController extends Controller
{
    public static function sendMail()
    {
        // get all Users
        $users = DB::table('users')
                ->whereNotIn('users.id', function($query){
                    $today = now()->toDateString();
                    $query
                        ->select('send_to')
                        ->from('mails')
                        ->whereDate('sent_at', '=', $today);
                }) 
                ->select('users.*')
                ->get();


        // send Mails
        foreach($users as $user){
            $username = $user->name;
            $email = $user->email;
            $mailbleObject = new ActivitiesDue($username);


            // save mail log
            $newMailLog = new MailModal;
            $newMailLog->send_to = $user->id;
            $newMailLog->send_to_email = $email;
            $newMailLog->subject = $mailbleObject->envelope()->subject;
            $newMailLog->content = $mailbleObject->build()->render();
            $newMailLog->sent_at = now();
            
            // send mail
            Mail::to($email)->send(new ActivitiesDue($username));
            $newMailLog->save();
        }

       return "send Mail";
    }
}
