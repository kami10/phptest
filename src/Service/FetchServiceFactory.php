<?php

namespace Kamran\Phptest\Service;

use Kamran\Phptest\Interfaces\FactoryInterface;
use Kamran\Phptest\System\ServiceManager;

class FetchServiceFactory implements FactoryInterface
{
    public function __invoke(ServiceManager $serviceManager): FetchService
    {
        $apiClient = new ApiClient([]);
        $dbService = $serviceManager->get(DBService::class);

        return new FetchService($apiClient, $dbService);
    }
}