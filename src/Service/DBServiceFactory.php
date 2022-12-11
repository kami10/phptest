<?php

namespace Kamran\Phptest\Service;

use Kamran\Phptest\Interfaces\FactoryInterface;
use Kamran\Phptest\System\ServiceManager;

class DBServiceFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $serviceManager): DBService
    {
        $dbConnection = $serviceManager->get(DBConnection::class);

        return new DBService($dbConnection);
    }
}