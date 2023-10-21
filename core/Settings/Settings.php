<?php

namespace App\Core\Settings;

class Settings implements Settings_Interface
{
    private array $config;

    public function __construct()
    {
        $this->config = require_once APP_PATH . '/config/config.php';
    }

    public function getBotToken(): string
    {
        return $this->config['env']['token'];
    }
    public function getBotId(): int
    {
        return $this->config['env']['bot_id'];
    }
    public function getBotName(): string
    {
        return $this->config['env']['bot_name'];
    }
}
