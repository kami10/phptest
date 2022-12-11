<?php

namespace Kamran\Phptest\Handler;

use Kamran\Phptest\Interfaces\FactoryInterface;
use Kamran\Phptest\Service\DBService;
use Kamran\Phptest\Service\FetchService;
use Kamran\Phptest\Service\ValidationService;
use Kamran\Phptest\System\ServiceManager;

class HomeHandlerFactory implements FactoryInterface
{
    public function __invoke(ServiceManager $serviceManager): HomeHandler
    {
        $fetchService = $serviceManager->get(FetchService::class);
        $validation = $serviceManager->get(ValidationService::class);
        $dbService = $serviceManager->get(DBService::class);

        return new HomeHandler($fetchService, $validation, $dbService);
    }
}