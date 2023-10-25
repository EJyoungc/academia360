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
            // 'test'=>$response, 
        ]);

        if (isset($request['message']['chat']['id'])) {
            
            $message = $request['message']['text'];
            $chat_id = $request['message']['chat']['id'];
            switch ($message) {
                case '/years':
                    # code...

                    $keyboard = [
                        'inline_keyboard' => [
                            [['text' => 'Click me', 'callback_data' => 'button_clicked']],
                        ],
                    ];
                    $response = Telegram::sendMessage([
                        'chat_id' => $chat_id,
                        'text' => 'Hello World',
                        'reply_markup' => json_encode($keyboard),
                    ]);
                    break;
                
                default:
                    # code...
                    break;
            }




        }


        // Log::channel('telegram')->debug('info not selected',[$response]);
        // // $update = Telegram::commandsHandler(true);
        // // $message = $update->getMessage();





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


        return response('OK', 200);
    }
}
