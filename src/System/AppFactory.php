<?php

namespace Kamran\Phptest\System;

use Kamran\Phptest\Interfaces\FactoryInterface;

class AppFactory implements FactoryInterface
{
    public function __invoke(ServiceManager $serviceManager): App
    {
        return new App($serviceManager);
    }
}