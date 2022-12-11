<?php

require '../vendor/autoload.php';

use Kamran\Phptest\System\App;
use Kamran\Phptest\System\ServiceManager;

$config = include_once __DIR__ . '/../config/dev.config.php';
$serviceManager = new ServiceManager($config);

/** @var $app */
$app = $serviceManager->get(App::class);
$app->run();