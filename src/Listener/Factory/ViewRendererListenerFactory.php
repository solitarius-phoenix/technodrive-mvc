<?php

namespace Technodrive\Mvc\Listener\Factory;

use Technodrive\Core\Interface\ContainerInterface;
use Technodrive\Core\Interface\FactoryInterface;
use Technodrive\Mvc\Listener\ViewRendererListener;
use Technodrive\Process\ProcessManager;

class ViewRendererListenerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container)
    {
        $process = $container->get(ProcessManager::class)->getProcess();
        return new ViewRendererListener($process);
    }
}