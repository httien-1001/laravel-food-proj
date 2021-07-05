<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    public function sentMail(){
        $details = [
            'title' =>'XIn chào',
            'body' => 'Tooi la aaa'
        ];
        Mail::to('ngovancanbn@gmail.com')->send(new \App\Mail\Gmail($details));
    }
}
