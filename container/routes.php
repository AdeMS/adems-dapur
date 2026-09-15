<?php

declare(strict_types=1);

use Mezzio\Application;
use Mezzio\MiddlewareFactory;
use Psr\Container\ContainerInterface;

$getCurrentHost = require __DIR__ . '/host.php';
$host = $getCurrentHost();

if ($host['normalized'] !== '') {
    $filesToCheck = [
        sprintf('%s/container/routes/%s.php', getcwd(), $host['normalized']),
        sprintf('%s/container/routes/%s.php', getcwd(), $host['normalized_underscored']),
        sprintf('%s/container/routes/%s.php', getcwd(), $host['without_domain']),
        sprintf('%s/container/routes/%s.php', getcwd(), $host['without_domain_underscored']),
        sprintf('%s/container/routes/default.php', getcwd()), // file route default
    ];

    foreach ($filesToCheck as $file) {
        if (is_file($file)) {
            $routeFile = $file;
            break;
        }
    }
}

return require $routeFile;