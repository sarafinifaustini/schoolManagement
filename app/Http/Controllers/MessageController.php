<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){
        $messages= Message::all();
        $users = User::all();
        // dd($messages);
        // return $messages;
        return view('dashboard.admin.messageList',compact('messages','users'));

    }
    public function send(Request $request){
        $message = Message::where('id',$request->message->id)->first();
        if($message){
            $users= User::All();
            if($users->count()>0){
                foreach($users as $user){
                $composeMessage = str_replace('[USER]',$user->name,$message->message);
                $args = http_build_query(array(
                'token' => '<token-provided>',
                'from'  => 'The Standard School',
                'to'    => $user->phone,
                'text'  => $composeMessage));

            $url = "http://api.sparrowsms.com/v2/sms/";

            # Make the call using API.
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            // Response
            $response = curl_exec($ch);
            $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            if($status_code == 200)
            {
                $response = json_decode($response);
                echo $response->response;
            }

                }
            }
        
        }
    }
}
