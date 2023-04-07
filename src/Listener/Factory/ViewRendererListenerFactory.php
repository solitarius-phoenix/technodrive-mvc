<?php

namespace Technodrive\Mvc\Listener\Factory;

use Technodrive\Core\Interface\ContainerInterface;
use Technodrive\Core\Interface\FactoryInterface;
use Technodrive\Mvc\Listener\ViewRendererListener;
use Technodrive\Mvc\ViewRenderer;
use Technodrive\Process\ProcessManager;

class ViewRendererListenerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container)
    {
        $process = $container->get(ProcessManager::class)->getProcess();
        $viewRenderer = $container->get(ViewRenderer::class);
        return new ViewRendererListener($process, $viewRenderer);
    }
}