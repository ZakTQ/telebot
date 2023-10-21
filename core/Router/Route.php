<?php

namespace App\Core\Router;

class Route
{
    public function __construct()
    {
    }

    public static function get(): static
    {
        return new static();
    }

    public function create(string $url, string $action, array $querry = [])
    {
        if ($action == '/sendPhoto') {
            //http_build_query — Генерирует URL-кодированную строку запроса
            //$querry = http_build_query($querry);
            //curl_init — Инициализирует сеанс cURL
            $ch = curl_init($url . $action); //<< no Querry
            //curl_setopt — Устанавливает параметр для сеанса CURL
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $querry);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HEADER, false);

            $result = curl_exec($ch);
            curl_close($ch);

            return $result;
        }
        if ($action == '/getUpdates') {
            $ch = curl_init($url . $action);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HEADER, false);

            $result = curl_exec($ch);
            curl_close($ch);

            return $result;
        } else {
            //http_build_query — Генерирует URL-кодированную строку запроса
            $querry = http_build_query($querry);
            //curl_init — Инициализирует сеанс cURL
            $ch = curl_init($url . $action . $querry);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HEADER, false);

            $result = curl_exec($ch);
            curl_close($ch);

            return $result;
        }
    }

    public function setWebhook(string $url,  array $site, string $action = '/setWebhook?')
    {
        //http_build_query — Генерирует URL-кодированную строку запроса
        $querry = http_build_query($site);
        //curl_init — Инициализирует сеанс cURL
        $ch = curl_init($url . $action . $querry);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}

    /*
    CURLOPT_RETURNTRANSFER true для возврата результата передачи в качестве строки из curl_exec() вместо прямого вывода в браузер.

    CURLOPT_SSL_VERIFYPEER	false для остановки cURL от проверки сертификата узла сети. Альтернативные сертификаты для проверки могут быть указаны с помощью параметра CURLOPT_CAINFO, или директории с сертификатами, указываемой параметром CURLOPT_CAPATH.	По умолчанию равно true, начиная с версии cURL 7.10. Дистрибутив по умолчанию устанавливается с версией cURL 7.10.

    CURLOPT_FTPLISTONLY	true для возврата только списка имён из FTP-директории.

    CURLOPT_POST	true для использования обычного HTTP POST. Данный метод POST использует обычный application/x-www-form-urlencoded, обычно используемый в HTML-формах.	

    CURLOPT_POSTFIELDS и означает, что значения, начинающиеся с @, могут быть безопасно переданы в качестве полей. Вместо этого для загрузки файлов можно использовать объект CURLFile.	
    */