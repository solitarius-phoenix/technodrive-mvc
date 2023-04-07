<?php

namespace Technodrive\Mvc\Listener\Factory;

use Technodrive\Core\Interface\ContainerInterface;
use Technodrive\Core\Interface\FactoryInterface;
use Technodrive\Mvc\LayoutRenderer;
use Technodrive\Mvc\Listener\LayoutRendererListener;
use Technodrive\Process\ProcessManager;

class LayoutRendererListenerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container)
    {
        $layoutRenderer = $container->get(LayoutRenderer::class);

        $process = $container->get(ProcessManager::class)->getProcess();
        return new LayoutRendererListener($process, $layoutRenderer);
    }
}