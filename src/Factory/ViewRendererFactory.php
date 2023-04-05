<?php

namespace Technodrive\Mvc\Factory;

use Technodrive\Core\Interface\ContainerInterface;
use Technodrive\Core\Interface\FactoryInterface;
use Technodrive\Mvc\ViewRenderer;

class ViewRendererFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container)
    {
        return new ViewRenderer();
    }

}