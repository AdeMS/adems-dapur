<?php

declare(strict_types=1);

use AdeMS\Mvc\Application;

// set start time
define('DAPUR_START', microtime(true));

// Change the working directory to application root
chdir(dirname(__DIR__));

// Composer autoloading
include getcwd() . '/vendor/autoload.php';

// Application container init..
$container = require getcwd() . '/config/application.container.php';

// Run the application!
/** @var Application $app */
$app = $container->get('Application');
$app->run();
