<?php

namespace Technodrive\Mvc\Listener;

use Technodrive\Core\Interface\ListenerInterface;
use Technodrive\Mvc\LayoutModel;
use Technodrive\Mvc\LayoutRenderer;
use Technodrive\Process\Process;

class LayoutRendererListener implements ListenerInterface
{

    protected Process $process;

    protected LayoutRenderer $renderer;

    public function __construct(Process $process, LayoutRenderer $renderer)
    {
        $this->process = $process;
        $this->renderer = $renderer;
    }
    public function call()
    {
        $view = $this->process->getResponse()->getView();
        $this->renderer->setView($view);

        $this->process->getResponse()->setBody(
            $this->renderer->render()
        );
    }

}