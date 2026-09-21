<?php

declare(strict_types=1);

use Laminas\ConfigAggregator\ConfigAggregator;
use Laminas\ConfigAggregator\PhpFileProvider;

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
    
    // Memuat konfigurasi aplikasi dalam urutan yang telah ditentukan sedemikian rupa sehingga
    // pengaturan lokal menimpa pengaturan global. (Dimuat dari pertama hingga terakhir):
    //   - `global.php`
    //   - `*.global.php`
    //   - `local.php`
    //   - `*.local.php`
    new PhpFileProvider(getcwd() . '/container/autoload/{{,*.}global,{,*.}local}.php'),

    // Load development config if it exists
    new PhpFileProvider(getcwd() . '/container/development.config.php'),
]);

return $aggregator->getMergedConfig();