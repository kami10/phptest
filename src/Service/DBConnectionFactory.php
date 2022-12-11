<?php

namespace Kamran\Phptest\Service;

use Kamran\Phptest\Interfaces\FactoryInterface;
use Kamran\Phptest\System\ServiceManager;

class DBConnectionFactory implements FactoryInterface
{
    public function __invoke(ServiceManager $serviceManager): DBConnection
    {
        return new DBConnection($serviceManager->get('config')['database'] ?? []);
    }
}