<?php

namespace App\Controllers;

use App\App\Controller\Controller;

class Main_Controller extends Controller{
    
    // public function getUpdates(int $chat_id, string $message): array
    // {
    //     $querry = [
    //         "chat_id"    => $chat_id,
    //         "text"       => $message,
    //         "parse_mode" => "html",
    //     ];

    //     return $querry;
    // }
    
    public function sayMessage(int $chat_id, string $message): array
    {
        $querry = [
            "chat_id"    => $chat_id,
            "text"       => $message,
            "parse_mode" => "html",
        ];

        return $querry;
    }
    public function reMessage(int $chat_id, string $message, $messageId): array
    {
        $querry = [
            "chat_id"    => $chat_id,
            "text"       => $message,
            "parse_mode" => "html",
            "reply_to_message_id" => $messageId,
        ];

        return $querry;
    }
    public function deleteMessage(int $chat_id, int $messageId): array
    {
        $querry = [
            "chat_id"    => $chat_id,
            "message_id" => $messageId,
        ];

        return $querry;
    }
    public function sayMessageWithButtons(int $chat_id, string $message, $reply_markup): array
    {
        $querry = [
            "chat_id"    => $chat_id,
            "text"       => $message,
            "parse_mode" => "html",
            'reply_markup' => $reply_markup,
        ];

        return $querry;
    }
    public function postPicture(int $chat_id, string $caption, array $fileInfo): array
    {
        $querry = [
            'chat_id' => $chat_id,
            'caption' => $caption,
            'photo' => curl_file_create(
                $fileInfo['path'],
                $fileInfo['type'],
                $fileInfo['name'],
            )
        ];

        //dd($querry);

        return $querry;
    }
}