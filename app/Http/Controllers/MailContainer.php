<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use \App\Mail\ActivitiesDue;

class MailContainer extends Controller
{
    public function sendMail()
    {
       $name="bob";
       Mail::to("test@test.com")->send(new ActivitiesDue($name));
       return "send Mail";
    }
}
