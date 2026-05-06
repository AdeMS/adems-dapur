<?php

declare(strict_types=1);

use Laminas\ConfigAggregator\ConfigAggregator;

$aggregator = new ConfigAggregator([
    \Mezzio\LaminasView\ConfigProvider::class,
    \Mezzio\Router\LaminasRouter\ConfigProvider::class,
    \Laminas\Router\ConfigProvider::class,
    \Laminas\HttpHandlerRunner\ConfigProvider::class,
    \Laminas\Validator\ConfigProvider::class,
    
    \Mezzio\Helper\ConfigProvider::class,
    \Mezzio\ConfigProvider::class,
    \Mezzio\Router\ConfigProvider::class,
    \Laminas\Diactoros\ConfigProvider::class,

    Dapur\ConfigProvider::class,
]);

return $aggregator->getMergedConfig();