<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Bot\Bot;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Exceptions\TelegramResponseException;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class BotController extends Controller
{
    public function index(Request $request, $id){
        $bot = Bot::find($id); // находим бота
        if(!$bot){
            return;
        }
        $token = $bot->token;
        $telegram = new Api($token);
        $result = $telegram->getWebhookUpdates(); // получаем запрос из бота

        if (isset($result["message"])){ // если это сообщение
            $chat_id = $result["message"]["chat"]["id"]; //id юзера
            $text = '';
            if(isset($result["message"]["text"])){
                $text = $result["message"]["text"]; //сообщение юзера
            }
            $info = $this->InfoUser($result, $bot, $text);
            $name = $info['name'];
            $username = $info['username'];

            if($text){
                if($text == '/start'){
                    $user = User::where('id_telegram', $chat_id)->first();
                    if(!$user){
                        $user = User::create([
                            'username' => $username,
                            'id_telegram' => $chat_id,
                            'name' => $name,
                            'status' => 'free'
                        ]);
                    }
                    try {
                        $response = $telegram->sendMessage([
                            'chat_id' => $chat_id,
                            'text' => "Привет $user->name, нажмите ии введите команду /start",
                            
                        ]);
                    } catch (TelegramResponseException $e) {
                        $response = "Заблокирован";
                    }
                }else{
                   
                }
            }
        }else{
            Log::emergency($result);
        }
        
    }
    function InfoUser($info){
        $name = 'Таинственный незнакомец';
        $username = '';
        if(isset($info["message"]["chat"]["first_name"])){
            $name = $info["message"]["chat"]["first_name"];
        }
        if(isset($info["message"]["chat"]["username"])){
            $username = $info["message"]["chat"]["username"];
        }
        if(isset($info["callback_query"])){
            if(isset($info['callback_query']["message"]["chat"]["id"])){
                $name = $info['callback_query']["message"]["chat"]["first_name"];
            }
            if(isset($info['callback_query']["message"]["chat"]["username"])){
                $username = $info['callback_query']["message"]["chat"]["username"];
            }
        }
        
        return ['name' => $name, 'username' => $username];
    }

}