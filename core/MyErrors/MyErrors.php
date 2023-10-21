<?php

namespace App\Core\MyErrors;

class MyErrors
{
    
    public function log($data): void
    {
        $log_file_name = APP_PATH . "\\log\\json.txt";
        $now = date("Y-m-d H:i:s");
        file_put_contents($log_file_name, $now . " " . print_r($data, true) . "\r\n", FILE_APPEND);
    }
}
