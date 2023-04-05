<?php

namespace Technodrive\Mvc;

class ViewModel extends AbstractView
{
    /**
     * View variables
     * @var array
     */
    protected array $variables;

    protected string $template = 'C:\Users\Sam\PhpstormProjects\Technodrive\module\Application\View\Application\Mock\index.phtml';

    protected string $html;





    public function setTemplate(string $templateName): void
    {
        $this->template = $templateName;
    }

    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * @return string
     */
    public function getHtml(): string
    {
        return $this->html;
    }

    /**
     * @param string $html
     * @return ViewModel
     */
    public function setHtml(string $html): ViewModel
    {
        $this->html = $html;
        return $this;
    }

}