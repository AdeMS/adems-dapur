<?php

declare(strict_types=1);

namespace Welcome\Handler;

use Laminas\Diactoros\Response\HtmlResponse;
use Mezzio\Template\TemplateRendererInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class WelcomePageHandler implements RequestHandlerInterface
{
    public function __construct(
        private TemplateRendererInterface $template
    )
    {
        
    }
    
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $params = [];
        $layout = dirname(__DIR__, 2) . '/templates/layout/default.phtml';

        if (is_file($layout)) {
            $params['layout'] = 'welcome-layout::default';
        }

        return new HtmlResponse($this->template->render(
            'welcome::welcome-page'
        ));
    }
}