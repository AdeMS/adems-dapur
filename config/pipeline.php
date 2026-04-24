<?php

declare(strict_types=1);

use Laminas\Stratigility\Middleware\ErrorHandler;
use Mezzio\Application;
use Mezzio\Handler\NotFoundHandler;
use Mezzio\Helper\ServerUrlMiddleware;
use Mezzio\Helper\UrlHelperMiddleware;
use Mezzio\MiddlewareFactory;
use Mezzio\Router\Middleware\DispatchMiddleware;
use Mezzio\Router\Middleware\ImplicitHeadMiddleware;
use Mezzio\Router\Middleware\ImplicitOptionsMiddleware;
use Mezzio\Router\Middleware\MethodNotAllowedMiddleware;
use Mezzio\Router\Middleware\RouteMiddleware;
use Psr\Container\ContainerInterface;

return function(Application $dapur, MiddlewareFactory $factory, ContainerInterface $container): void {
    $dapur->pipe(ErrorHandler::class);
    $dapur->pipe(ServerUrlMiddleware::class);

    $dapur->pipe(RouteMiddleware::class);

    $dapur->pipe(ImplicitHeadMiddleware::class);
    $dapur->pipe(ImplicitOptionsMiddleware::class);
    $dapur->pipe(MethodNotAllowedMiddleware::class);

    $dapur->pipe(UrlHelperMiddleware::class);

    $dapur->pipe(DispatchMiddleware::class);

    $dapur->pipe(NotFoundHandler::class);
};