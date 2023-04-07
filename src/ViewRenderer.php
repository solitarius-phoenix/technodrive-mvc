<?php

namespace Technodrive\Mvc;

use Technodrive\Core\Interface\ContainerInterface;
use Technodrive\Core\Trait\FileTrait;
use Technodrive\Mvc\Exception\TemplateNotFoundException;
use Technodrive\Mvc\interface\ViewInterface;

class ViewRenderer
{
    use FileTrait;

    protected ViewInterface $view;

    protected ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function __call(string $method, array $params=[]): mixed
    {
        //die('call en cours');
        $factory = $this->container->get($method);
        return $factory();
    }

    public function __get(string $name): mixed
    {
        return $this->view->getVariable($name);
    }

    public function setView(ViewInterface $view): self
    {
        $this->view = $view;
        return $this;
    }

    /**
     * @return string
     * @throws TemplateNotFoundException
     */
    public function render(): string
    {
        $file = $this->view->getFile();
        $this->testPath($file);
        ob_start();
        require_once $file;
        return ob_get_clean();
    }

}