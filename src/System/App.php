<?php

namespace Kamran\Phptest\System;

use Kamran\Phptest\Handler\HomeHandler;
use Kamran\Phptest\Interfaces\HandlerInterface;

class App
{
    private ServiceManager $serviceManager;

    public function __construct(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    public function run()
    {
        $handler = $this->serviceManager->get(HomeHandler::class);
        if ($handler instanceof HandlerInterface) {
            echo $handler->handle();
            return;
        }
    }
}