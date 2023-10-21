<?php

namespace App\Core\Request;

interface Request_Interface
{
    public function getUri();
    
    public function getMethod();

    public function getGet();

    public function getPost();
}
