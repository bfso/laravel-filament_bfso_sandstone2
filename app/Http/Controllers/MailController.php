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
        // 
        $today = now()->toDateString();
        
        // 
        $users = DB::table('users')
                ->whereNotIn('users.id', function($query){
                    $query->select('send_to')->form('user');
                }) 
                ->select('users.*')
                ->get();


        
       $name="bob";
       Mail::to("test@test.com")->send(new ActivitiesDue($name));
       return "send Mail";
    }
}
