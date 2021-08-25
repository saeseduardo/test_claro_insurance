<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\UserMail;
use App\Models\Email;

class EmailController extends Controller
{
    public function __construct(){

    }

    public function index(){
        $email = Email::all();
        return view('emails.index', compact('email'));
    }

    public function create(){
        return view('emails.create');
    }

    public function send(Request $request){
        $newEmail = Email::create([
            'user_id' => \Auth::user()->id,
            'subject' => $request->subject,
            'email' => $request->email
        ]);
        
        \Mail::to($newEmail)->send(new UserMail($request));
    }
}
