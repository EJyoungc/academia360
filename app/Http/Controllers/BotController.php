<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use Illuminate\Http\Request;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Support\Facades\Log;

class BotController extends Controller
{
    //


    public function telegram(Request $request){
        // $update = json_decode($request->getContent(), true);
        // event( new NewMessage($update));

        Log::channel('telegram')->debug('Incoming Telegram Webhook Data', [
            'all'=>$request->all(),
            'update' => $request['update_id'],
            'message_id' => $request['message']['message_id'],
            'message_from' => $request['message']['from'],
            // 'chat_id' => $request['chat'],
        ]);
    
        // Your bot logic here
    
        // return 'OK';
        // $chat = TelegraphChat::find(1);
        // // dd($chat);
        // $chat->html("<strong>Hello!</strong>\n\nI'm here!")->send();
        // Process the update (e.g., respond to user messages)
        // Implement your bot's logic here

        // Send a response (e.g., 200 OK)
        return response('OK', 200);
    }
}
