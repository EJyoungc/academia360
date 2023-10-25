<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Models\AcademicYearStudentLog;
use App\Models\Classroom;
use App\Models\ClassRoomType;
// use DefStudio\Telegraph\Keyboard\Button;
// use DefStudio\Telegraph\Keyboard\Keyboard;
// use DefStudio\Telegraph\Models\TelegraphBot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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


    
        // $message = $request['message']['text'] ?? '';
        // $chat_id = $request['message']['chat']['id'] ?? '';
        // $full_name = $request['message']['from']['first_name'] ?? '' . ' ' . $request['message']['from']['last_name'] ?? '';
        // $callbackData = $request['callback_query']['data'] ?? '';
        // $data = $request['data'] ?? '';
        // $chat_id = $request['chat_id'] ?? '';
        // $name = $request['name']?? '';

        // $this->selectoption(
        //     $chat_id,
        //     $name,
        //     $data);


        Log::channel('telegram')->debug('Data feed', [
            'data' => $request['callback_query']['data'] ?? '',
            'chat_id' => $request['callback_query']['message']['chat']['id'] ?? '',
        ]);


        

        if (isset($request['callback_query']['data'])) {

            Log::channel('telegram')->debug('is reply', [
            //     'data' =>$request['callback_query']['data']??'',
            //      'chat_id' =>$request['callback_query']['message']['chat']['id']??'',
            //     'all' => $request->all(),

            ]);
            $this->selectoption(
                $request['callback_query']['message']['chat']['id'],
                $request['callback_query']['message']['chat']['first_name'] ,
                $request['callback_query']['data']);
        }


        if (isset($request['message']['chat']['id'])) {
            Log::channel('telegram')->debug('is working', [
                // 'data' =>$request['message']['text']??'',
                // 'data' =>$request['message']['chat']['id']??'',
                //  'chat_id' =>$request['callback_query']['message']['chat']['id']??'',
                // 'all' => $request->all(),
                //  'test' => $request['chat_instance'],

                // 'test'=>$response, 
            ]);
            $this->menu($request['message']['text'], $request['message']['chat']['id'],$request['message']['chat']['first_name']);
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



    public function selectoption($chat_id, $full_name, $callbackData)
    {

        Log::channel('telegram')->debug('selected option', [
            'testit' => $callbackData,
            "name" => $full_name,
            'chat_id'=>$chat_id, 
        ]);
        // $message = $data['message']['text'];
        // $chat_id = $data['message']['chat']['id'];
        // $full_name = $data['message']['from']['first_name'] . ' ' . $data['message']['from']['last_name'];
        // if (isset($callbackData)) {

            list($model, $id) = explode(' ', $callbackData);

            // $chatId = $data['callback_query']['message']['chat']['id'];
            Log::channel('telegram')->debug('explode', [
                'model' => $model,
                "id" => $id,
                // 'chat_id'=>$chat_id, 
            ]);
            // Handle different options based on the custom data
            switch ($model) {
                case "classrooms":
                    Log::channel('telegram')->debug('classroom', [
                        // 'classroomtype' => $classroomtype,
                        // "classroom" => Classroom::where('classroom_id',$id)->get()??'',
                        // 'chat_id'=>$chat_id, 
                    ]);
                    $classroomtype = ClassRoomType::find($id);
                    $classrooms = Classroom::where('classroom_type_id', $id)->orderBy('name', 'asc')->get();
                    $buttons = [];

                    Log::channel('telegram')->debug('switch classrooms', [
                        // 'classroomtype' => $classroomtype,
                        // "classroom" => $classrooms,
                        // 'chat_id'=>$chat_id, 
                    ]);

                    foreach ($classrooms as  $class) {
                        array_push($buttons, ['text' => " 🎓 $class->name", "callback_data" => "students  $class->id"]);
                    }
                    $buttonsInRow = 2;
                    $keyboard = [

                        'inline_keyboard' => array_chunk($buttons, $buttonsInRow),
                    ];
                    $response = Telegram::sendMessage([
                        'chat_id' => $chat_id,
                        'text' => " Hey 😊 👋' *$full_name* *Here are the Class Rooms in $classroomtype->name  you wanted*👇  ",
                        'parse_mode' => 'Markdown',
                        'reply_markup' => json_encode($keyboard),
                    ]);

                    break;
                    case 'students':
                        

                        Log::channel('telegram')->debug('students', [
                            // 'classroomtype' => $classroomtype,
                            // "classroom" => Classroom::where('classroom_id',$id)->get()??'',
                            // 'chat_id'=>$chat_id, 
                        ]);
                        $classroom = Classroom::find($id);
                        $classStudents = AcademicYearStudentLog::where('classroom_id', $id)->where('status','current')->get();
                        $buttons = [];
    
                        Log::channel('telegram')->debug('switch student', [
                            // 'classroomtype' => $classroomtype,
                            // "classroom" => $classrooms,
                            // 'chat_id'=>$chat_id, 
                        ]);
    
                        foreach ($classStudents as  $student) {
                            array_push($buttons, ['text' => " 🎓 $student->student->name", "callback_data" => "students  $student->student_id"]);
                        }
                        $buttonsInRow = 2;
                        $keyboard = [
    
                            'inline_keyboard' => array_chunk($buttons, $buttonsInRow),
                        ];
                        $response = Telegram::sendMessage([
                            'chat_id' => $chat_id,
                            'text' => " Hey 😊 👋' *$full_name* *Here are the Class Rooms in $classroom->name  you wanted*👇  ",
                            'parse_mode' => 'Markdown',
                            'reply_markup' => json_encode($keyboard),
                        ]);





                        break;
                    // case 'option_3_data':
                    //     $text = 'You selected Option 3.';
                    //     break;
                default:
                    $text = 'Invalid selection.';
                    break;
            // }
        }
    }







    public function menu($message, $chat_id, $full_name)
    {

        switch ($message) {
            case '/years':
                # code...
                $classes = ClassRoomType::orderBy('name', 'asc')->get();
                $buttons = [];

                foreach ($classes as  $class) {
                    array_push($buttons, ['text' => " 🎓 $class->name", "callback_data" => "classrooms $class->id"]);
                }
                $buttonsInRow = 2;
                $keyboard = [

                    'inline_keyboard' => array_chunk($buttons, $buttonsInRow),
                ];
                $response = Telegram::sendMessage([
                    'chat_id' => $chat_id,
                    // 'photo' => public_path("bot/bot.jpg"),
                    // 'caption' => "Hello  *$full_name* ",
                    'text' => " Hey 😊 👋' *$full_name* *Here are the Academic  Classes you wanted*👇  ",
                    'parse_mode' => 'Markdown',
                    'reply_markup' => json_encode($keyboard),
                ]);
                break;

            default:
                # code...
                break;
        }
    }
}
