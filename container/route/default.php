<?php

declare(strict_types=1);

return [
    [
        'name' => 'home',
        'path' => '/',
        'middleware' => Dapur\Handler\WelcomePageHandler::class,
        'allowed_methods' => ['GET'],
    ],
];