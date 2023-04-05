<?php

namespace Technodrive\Mvc\Listener;

use Technodrive\Core\Interface\ListenerInterface;
use Technodrive\Mvc\LayoutModel;
use Technodrive\Process\Process;

class LayoutRendererListener implements ListenerInterface
{

    protected Process $process;

    protected string $templatePath;

    public function __construct(Process $process, string $templatePath)
    {
        $this->process = $process;
        $this->templatePath = $templatePath;
    }
    public function call()
    {
        $content = $this->process->getResponse()->getBody();
        $layout = new LayoutModel();
        $layout->setTemplate($this->templatePath);
        $layout->setVariables( $this->process->getResponse()->getView()->getVariables() );
        $layout->setContent($content);


        $this->process->getResponse()->setBody(
            $layout->render()
        );
    }

}