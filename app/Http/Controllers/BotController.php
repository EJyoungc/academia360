<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DefStudio\Telegraph\Models\TelegraphChat;

class BotController extends Controller
{
    //


    public function telegram(Request $request){
        $update = json_decode($request->getContent(), true);
        // $chat = TelegraphChat::find(1);
        // // dd($chat);
        // $chat->html("<strong>Hello!</strong>\n\nI'm here!")->send();
        // Process the update (e.g., respond to user messages)
        // Implement your bot's logic here

        // Send a response (e.g., 200 OK)
        return response('OK', 200);
    }
}
