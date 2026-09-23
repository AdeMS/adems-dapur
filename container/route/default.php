<?php

declare(strict_types=1);

return [
    [
        'name' => 'home.welcome',
        'path' => '/',
        'middleware' => Dapur\Handler\WelcomePageHandler::class,
        'allowed_methods' => ['GET'],
    ],
];