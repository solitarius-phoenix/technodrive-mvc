<?php

namespace Technodrive\Mvc\Listener;

use Technodrive\Process\Process;

class ViewRendererListener
{
    protected Process $process;

    public function __construct(Process $process)
    {
        $this->process = $process;
    }

    public function call()
    {
        $view = $this->process->getResponse()->getView();
        $this->process->getResponse()->setBody($view->render());
        //echo($this->process->getResponse()->getBody());
    }

}