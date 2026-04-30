<?php

declare(strict_types=1);

namespace Dapur;

class ConfigProvider
{
    /**
     * Returns the configuration array.
     *
     * To add a bit of a structure, each section is defined in a separate
     * file in the 'config' folder.
     */
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
        ];
    }

    /**
     * Returns the container dependencies.
     */
    public function getDependencies(): array
    {
        return [
            'invokables' => [
                
            ],
            'factories'  => [

            ],
        ];
    }

    /**
     * Returns the templates configuration.
     */
    public function getTemplates(): array
    {
        return [
            'paths' => [
                'error'  => [dirname(__DIR__) . '/templates/error'],
                'layout' => [dirname(__DIR__) . '/templates/layout'],
            ],
        ];
    }
}