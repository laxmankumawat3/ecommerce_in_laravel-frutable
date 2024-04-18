<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendEmailToUser;

class mailController extends Controller
{
    //
    public function mainsend(Request $request){
        $mailData = [
            "title"=> "Frutable",
            "body"=>"you buy our product successfully!",
        ];
      
        $userEmail = auth()->user()->email;
        Mail::to($userEmail)->send(new SendEmailToUser($mailData));
        // dd("email send successfully");
        return redirect('/');
    }
    

    public function index(){
        echo auth()->user()->email;
    }
}
