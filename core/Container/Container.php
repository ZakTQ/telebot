<?php

namespace App\Core\Container;

//use App\Core\Controller\Controller;

use App\Core\Router\Router;
use App\Core\Router\Router_Interface;

use App\Core\Model\Model;
use App\Core\Model\Model_Interface;
use App\Core\MyErrors\MyErrors;
use App\Core\Request\Request;
use App\Core\Request\Request_Interface;
use App\Core\Settings\Settings;
use App\Core\Settings\Settings_Interface;

use App\Core\View\View;
use App\Core\View\View_Interface;

class Container
{
    public readonly Settings_Interface $settings;
    public readonly Request_Interface $request;
    //public readonly Controller $controller;
    public readonly View_Interface $view;
    public readonly Model_Interface $model;
    public readonly MyErrors $myerrors;
    public  readonly Router_Interface $router;

    public function __construct(
    ) {
        $this->settings = new Settings();
        $this->request = new Request();
        $this->view = new View();
        $this->model = new Model();
        //$this->controller = new Controller();
        $this->myerrors = new MyErrors();
        $this->router = new Router(
            $this->settings->getBotToken(),
            $this->settings->getBotName(),
            $this->myerrors,
        );
    }
}
