<?php

namespace Kamran\Phptest\Service;

use Kamran\Phptest\Interfaces\FactoryInterface;
use Kamran\Phptest\System\ServiceManager;

class ValidationServiceFactory implements FactoryInterface
{
    public function __invoke(ServiceManager $serviceManager)
    {
        return new ValidationService();
    }
}