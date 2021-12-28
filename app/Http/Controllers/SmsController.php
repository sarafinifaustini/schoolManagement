<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class SmsController extends Controller
{
    public function index(){
        Nexmo::message()->send([
        'to'=>'254748607181',
        'from'=>'sender',
        'text'=>'Text SMS',
        ]);
        echo "Message Sent!";
    }
}
