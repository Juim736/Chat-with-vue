<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

	 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function chat(){
    	return view('chat');
    }
    public function test(){
    	$user = User::find(Auth::user()->id);
    	event(new ChatEvent('hi ki  khobor',$user));
    }
    public function send(Request $request){
    	$user = User::find(Auth::user()->id);
    	$message =  $request->message;
    	event(new ChatEvent($message , $user));
    }
    // public function send(){
    // 	$user = User::find(Auth::user()->id);
    // 	$message =  'fsgsgg';
    // 	event(new ChatEvent($message , $user));
    // }
}
