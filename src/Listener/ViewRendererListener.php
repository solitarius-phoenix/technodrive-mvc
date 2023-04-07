<?php

namespace Technodrive\Mvc\Listener;

use Technodrive\Core\Interface\ListenerInterface;
use Technodrive\Mvc\ViewRenderer;
use Technodrive\Process\Process;

class ViewRendererListener implements ListenerInterface
{
    protected Process $process;
    protected ViewRenderer $renderer;

    public function __construct(Process $process, ViewRenderer $renderer)
    {
        $this->process = $process;
        $this->renderer = $renderer;
    }

    public function call()
    {
        $view = $this->process->getResponse()->getView();
        $this->renderer->setView($view);
        $rendered = $this->renderer->render();
        $rendered = $rendered?$rendered:'';
        $this->process->getResponse()->setBody($rendered);
    }

}