<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PHPUnit\Util\Test;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class MailController extends Controller
{
        /* Send Email Using Gmail SMTP in laravel */
    public function SendMail(){
        $details = [
            "title" => "Hi...",
        ];
    
        Mail::to("abulqasimansari842@gmail.com")->send(new TestMail($details));
        echo "<h1>Email has send successfully.</h1>";
    }
    
}
