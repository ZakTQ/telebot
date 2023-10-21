<?php

namespace App\Core\Request;

class Request implements Request_Interface
{
    private string $uri;
    private string $method;
    private array $get;
    private array $post;

    public function __construct()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->get = $_GET;
        $this->post = $_POST;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getGet(): array
    {
        return $this->get;
    }

    public function getPost(): array
    {
        return $this->post;
    }
}
