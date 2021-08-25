<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\UserMail;

class EmailController extends Controller
{
    public function __construct(){

    }

    public function index(){

    }

    public function create(){
        return view('emails.create');
    }

    public function send(Request $request){
        
        \Mail::to($request->email)->send(new UserMail($request));
    }
}
