<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use Illuminate\Http\Request;
use App\Mail\ActivitiesDue;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Mail $mail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mail $mail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mail $mail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mail $mail)
    {
        //
    }
    


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
            Mail::to($email)->send(new ActivitiesDue($username));
        }

       return "send Mail";
    }
}
