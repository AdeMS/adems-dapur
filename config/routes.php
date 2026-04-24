<?php

declare(strict_types=1);

use Mezzio\Application;
use Mezzio\MiddlewareFactory;
use Psr\Container\ContainerInterface;

return static function(Application $dapur, MiddlewareFactory $factory, ContainerInterface $container): void {
    // Register routes here with $app->get(), $app->post(), etc.
};