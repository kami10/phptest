<?php

namespace Kamran\Phptest\Interfaces;

use Kamran\Phptest\System\ServiceManager;

interface FactoryInterface
{
    public function __invoke(ServiceManager $serviceManager);
}