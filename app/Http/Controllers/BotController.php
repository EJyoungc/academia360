<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use Illuminate\Http\Request;
use DefStudio\Telegraph\Models\TelegraphChat;
use DefStudio\Telegraph\Telegraph;
use Illuminate\Support\Facades\Log;

class BotController extends Controller
{
    //


    public function telegram(Request $request)
    {
        // $update = json_decode($request->getContent(), true);
        // event( new NewMessage($update));


        Log::channel('telegram')->debug('Incoming Telegram Webhook Data', [
            // 'all'=>$request->all(),
            // 'chat_test' => $chat2,
            'update' => $request['update_id'] ?? "",
            'message_id' => $request['message']['message_id'] ?? "",
            'message_from_id' => $request['message']['from']['id'] ?? "",
            'bot' => $request['message']['from']['is_bot'] ?? "",
            'message_firstname' => $request['message']['from']['first_name'] ?? "",
            'message_lastname' => $request['message']['from']['last_name'] ?? "",
            'message_type' => $request['message']['from']['type'] ?? "",
            'message_chat_id' => $request['message']['chat']['id'] ?? "",
            'message_body' => $request['message']['text'] ?? "",
            'message_type' => $request['entities'][0]['type'] ?? "",
            'query' => ''
        ]);
        $firstname = $request['message']['from']['first_name'] ?? "";
        $message_chat_id = $request['message']['chat']['id'] ?? "";

        $chat2 = TelegraphChat::where("chat_id", $request['message']['chat']['id'] ?? "")->first();
        if ($chat2 == null) {
            $chat = TelegraphChat::create([
                'chat_id' => $message_chat_id,
                'name' => $firstname,
            ]);
            $chat->html("<strong>Hello!</strong>\n\nI'm here!")->send();

            // $chat2 = TelegraphChat::where("chat_id", $request['message']['chat']['id'] ?? "")->first();
        } else {
        }

        // $chat = $telegraph_bot->chats()->create([
        //         'chat_id' => $firstname,
        //         'name' => $message_chat_id,
        //     ]);

        // Your bot logic here

        // return 'OK';
        // $chat = $telegraph_bot->chats()->create([
        //     'chat_id' => $firstname,
        //     'name' => $message_chat_id,
        // ]);
        // $chat = TelegraphChat::find(1);
        // // dd($chat);
        // $chat->html("<strong>Hello!</strong>\n\nI'm here!")->send();
        // Process the update (e.g., respond to user messages)
        // Implement your bot's logic here

        // Send a response (e.g., 200 OK)
        return response('OK', 200);
    }
}
