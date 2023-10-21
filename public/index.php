<?php

define('APP_PATH', dirname(__DIR__));

require_once '../vendor/autoload.php';

use App\Core\BotRunner;

$app = new BotRunner();
$app->run();
