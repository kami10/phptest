<?php

namespace Kamran\Phptest\System;

use Exception;
use Kamran\Phptest\Interfaces\FactoryInterface;

class ServiceManager
{
    public array $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function get($class)
    {
        if ($class === 'config') {
            return $this->config;
        }

        $factories = $this->config['factories'];
        $factory = new $factories[$class];
        if ($factory instanceof FactoryInterface) {
            return $factory($this);
        }
        throw new Exception('Factory not registered');
    }
}