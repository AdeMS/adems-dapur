<?php

declare(strict_types=1);

return [
    [
        'name' => 'home.welcom',
        'path' => '/',
        'middleware' => Dapur\Handler\WelcomePageHandler::class,
        'allowed_methods' => ['GET'],
    ],
];