<?php

namespace Technodrive\Mvc\View_helpers\Factory;

use Technodrive\Core\Interface\ContainerInterface;
use Technodrive\Core\Interface\FactoryInterface;
use Technodrive\Mvc\View_helpers\HeadtitleHelper;

class HeadTitleHelperFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container)
    {
        return new HeadtitleHelper();
    }
}