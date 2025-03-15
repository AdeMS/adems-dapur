<?php

declare(strict_types=1);

use Laminas\Mvc\Application;
use Laminas\Stdlib\ArrayUtils;
use RuntimeException;

if (! class_exists(Application::class)) {
    throw new RuntimeException(
        "Unable to load application.\n"
        . "- Type `composer install` if you are developing locally.\n"
        . "- Type `docker-compose run laminas composer install` if you are using Docker.\n"
    );
}

// Retrieve configuration
$appConfig = require getcwd() . '/config/application.config.php';
if (file_exists(getcwd() . '/config/development.config.php')) {
    /** @var array $devConfig */
    $devConfig = require getcwd() . '/config/development.config.php';
    $appConfig = ArrayUtils::merge($appConfig, $devConfig);
}

return Application::init($appConfig)
    ->getServiceManager();
