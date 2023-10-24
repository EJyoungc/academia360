<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Models\ClassRoomType;
// use DefStudio\Telegraph\Keyboard\Button;
// use DefStudio\Telegraph\Keyboard\Keyboard;
// use DefStudio\Telegraph\Models\TelegraphBot;
use Illuminate\Http\Request;
// use DefStudio\Telegraph\Models\TelegraphChat;
// use DefStudio\Telegraph\Telegraph;
use Illuminate\Support\Facades\Log;

use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Api;

class BotController extends Controller
{
    //

    public $bot;
    public $chat;
    public $data;
    protected $telegram;

    /**
     * Create a new controller instance.
     *
     * @param  Api  $telegram
     */
    public function __construct(Api $telegram)
    {
        $this->telegram = $telegram;
    }


    public function telegram(Request $request)
    {

        Log::channel('telegram')->debug('Data feed', [
            'all' => $request->all(),
            // 'test' => Telegram::getWebhookUpdate(), 
        ]);

        $response = $telegram->sendMessage([
            'chat_id' => 'CHAT_ID',
            'text' => 'Hello World'
        ]);

        // Log::channel('telegram')->debug('info not selected',[$response]);
        // // $update = Telegram::commandsHandler(true);
        // // $message = $update->getMessage();

        // if ($message->has('text')) {
        //     $response = $telegram->sendMessage([
        //         'chat_id' => 'CHAT_ID',
        //         'text' => 'Hello World'
        //     ]);
        // }



        // $this->data = [

        //     'update' => $request['update_id'] ?? "",
        //     'message_id' => $request['message']['message_id'] ?? "",
        //     'message_from_id' => $request['message']['from']['id'] ?? "",
        //     'bot' => $request['message']['from']['is_bot'] ?? "",
        //     'message_firstname' => $request['message']['from']['first_name'] ?? "",
        //     'message_lastname' => $request['message']['from']['last_name'] ?? "",
        //     'message_type' => $request['message']['from']['type'] ?? "",
        //     'message_chat_id' => $request['message']['chat']['id'] ?? "",
        //     'message_body' => $request['message']['text'] ?? "",
        //     'message_type' => $request['entities'][0]['type'] ?? "",
        //     'query' => ''
        // ];
        Log::channel('telegram')->debug('Data feed', [
            'all' => $request->all(),
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
        

        
        } else {

            // comand checker

            switch ($request['message']['text']) {
                case '/menu':
                    # code.
                   

                    break;
                case '/years':



                    break;
                default:
                Log::channel('telegram')->debug('info not selected',[]);
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

        // Telegram::sendMessage([
        //     'chat_id' => $update->getChat()->getId(),
        //     'text' => $text,
        // ]);
    }
}
