<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mail;
//use Illuminate\Support\Facades\Mail;
//use App\Mail\ReservationMail;

class MailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        $mails = Mail::all();
       // foreach($mails as $mail) {
            
        //    Mail::to($mail->email)->send(new ReservationMail());
        //}
        
        return view('mail/index', compact('mails'));
    }
}
