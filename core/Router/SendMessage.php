<?php

namespace App\Core\Router;

class SendMessage
{

    public function __construct()
    {
    }

    public static function send( $json, string $token)
    {
        $message = $json["message"]["text"];
        $from =  $json["message"]["from"]["id"];
        $getQuery = array(
            "chat_id"     => $from,
            "text"      => $message,
            "parse_mode" => "html",
        );
        $ch = curl_init("https://api.telegram.org/bot" . $token . "/sendMessage?" . http_build_query($getQuery));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);

        $resultQuery = curl_exec($ch);
        curl_close($ch);
    }


}
