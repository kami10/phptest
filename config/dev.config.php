<?php

use Kamran\Phptest\Handler\HomeHandler;
use Kamran\Phptest\Handler\HomeHandlerFactory;
use Kamran\Phptest\Service\DBConnection;
use Kamran\Phptest\Service\DBConnectionFactory;
use Kamran\Phptest\Service\DBService;
use Kamran\Phptest\Service\DBServiceFactory;
use Kamran\Phptest\Service\FetchService;
use Kamran\Phptest\Service\FetchServiceFactory;
use Kamran\Phptest\Service\ValidationService;
use Kamran\Phptest\Service\ValidationServiceFactory;
use Kamran\Phptest\System\App;
use Kamran\Phptest\System\AppFactory;

return [
    'database' => [
        'host' => 'localhost',
        'username' => 'root',
        'password' => 'root',
        'dbname' => 'phptest_db'
    ],
    'factories' => [
        HomeHandler::class => HomeHandlerFactory::class,
        DBConnection::class => DBConnectionFactory::class,
        DBService::class => DBServiceFactory::class,
        FetchService::class => FetchServiceFactory::class,
        ValidationService::class => ValidationServiceFactory::class,
        App::class => AppFactory::class,
    ],
];