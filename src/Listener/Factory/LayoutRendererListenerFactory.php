<?php

namespace Technodrive\Mvc\Listener\Factory;

use Technodrive\Core\Interface\ContainerInterface;
use Technodrive\Core\Interface\FactoryInterface;
use Technodrive\Mvc\Listener\LayoutRendererListener;
use Technodrive\Process\ProcessManager;

class LayoutRendererListenerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container)
    {
        $process = $container->get(ProcessManager::class)->getProcess();
        $module = $process->getControllerModule();
        $moduleTemplatePath = $module . '/layout';
        $templates = $container->getConfig()['view_manager']['template_map'];
        $templatePath = $templates[$moduleTemplatePath]??$templates['layout/layout'];
        return new LayoutRendererListener($process, $templatePath);
    }
}