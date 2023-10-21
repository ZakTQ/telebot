<?php

namespace App\Core\Router;

use App\Core\MyErrors\MyErrors;

// use App\App\Controller\Controller;

class Router implements Router_Interface
{
    private array $routes = [];
    private  $data;
    private  $json;


    public function __construct(
        public readonly string $token,
        public readonly string $bot_name,
        public readonly MyErrors $errors,
    ) {
        $this->initData();
    }

    public function onUpdateReceived(): void
    {

        if (isset($this->json["message"])) {
            $this->errors->log($this->json);
            SendMessage::send($this->json, $this->token);
        }
    }

    private function initData()
    {
        $this->data = file_get_contents('php://input');
        $this->json = json_decode($this->data, true);
    }
}
