<?php

namespace App\Core;

use App\Core\Container\Container;

class BotRunner
{

    public function __construct(
       public Container $container = new Container(),
    ) {
    }

    public function run()
    {
        /** @var Router $this->container->router */
        $this->container->router->onUpdateReceived(
            
        );
    }
}
