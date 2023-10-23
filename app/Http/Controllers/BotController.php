<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Models\TelegraphBot;
use Illuminate\Http\Request;
use DefStudio\Telegraph\Models\TelegraphChat;
use DefStudio\Telegraph\Telegraph;
use Illuminate\Support\Facades\Log;

class BotController extends Controller
{
    //

    public $bot;
    public $chat;
    public $data;


    public function telegram(Request $request)
    {
        // $update = json_decode($request->getContent(), true);
        // event( new NewMessage($update));
        $this->bot = TelegraphBot::find(1);
        $this->data = [

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
        ];
        Log::channel('telegram')->debug('Data feed', [
            'all'=>$request->all(),
            // 'chat_test' => ,
            // 'update' => $request['update_id'] ?? "",
            // 'message_id' => $request['message']['message_id'] ?? "",
            // 'message_from_id' => $request['message']['from']['id'] ?? "",
            // 'bot' => $request['message']['from']['is_bot'] ?? "",
            // 'message_firstname' => $request['message']['from']['first_name'] ?? "",
            // 'message_lastname' => $request['message']['from']['last_name'] ?? "",
            // 'message_type' => $request['message']['from']['type'] ?? "",
            // 'message_chat_id' => $request['message']['chat']['id'] ?? "",
            // 'message_body' => $request['message']['text'] ?? "",
            // 'message_type' => $request['entities'][0]['type'] ?? "",
            // 'query' => ''
        ]);
        $firstname = $request['message']['from']['first_name'] ?? "";
        $message_chat_id = $request['message']['chat']['id'] ?? "";
        $message_id = $request['message']['message_id'] ?? "";

        $chat2 = TelegraphChat::where("chat_id", $request['message']['chat']['id'] ?? "")->first();
        $this->chat = TelegraphChat::where("chat_id", $request['message']['chat']['id'] ?? "")->first();
        if ($chat2 == null) {
            $chat = $bot->chats()->create([
                'chat_id' => $message_chat_id,
                'name' => $firstname,
            ]);
            $chat->html("<strong>Hello!</strong>\n\nI'm here!")->send();
        } else {

            // comand checker

            switch ($request['message']['text']) {
                case '/menu':
                    # code.
                    $chat2 = TelegraphChat::where("chat_id", $request['message']['chat']['id'] ?? "")->first();
                    // $chat2->html("<strong>Hello $firstname !</strong> \n\n how can i help you ?")->reply($message_id)->send();
                    $chat2->html("<strong>Hello $firstname !</strong> \n\n Please Select the Option Available")->keyboard(Keyboard::make()->buttons([
                        Button::make("Classes")->action("view")->param('classes','all'),
                        Button::make("📖 Students")->action("read")->param('id','43'),
                        // Button::make("👀 ")->url('https://test.it'),  
                    ])->chunk(2))->send();

                    break;
                    // case''

                default:

                    break;
            }
        }

        
        return response('OK', 200);
    }


    private function handleCommand($update)
    {
        $command = $update->getCommand();

        switch ($command) {
            case 'start':
                $this->showMainMenu($update);
                break;
            case 'menu1':
                $this->showMenu1($update);
                break;
            case 'menu2':
                $this->showMenu2($update);
                break;
            default:
                $this->showMainMenu($update);
                break;
        }
    }

    public function  test()
    {
        $this->chat->html("test")->send();
    }

    private function showMenu1($update)
    {
        $text = "You are in Menu 1. What would you like to do next?";
    }

    // Show Menu 2
    private function showMenu2($update)
    {
        $text = "You are in Menu 2. What would you like to do next?";

        Telegram::sendMessage([
            'chat_id' => $update->getChat()->getId(),
            'text' => $text,
        ]);
    }
}
