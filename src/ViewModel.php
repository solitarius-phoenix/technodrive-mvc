<?php

namespace Technodrive\Mvc;

class ViewModel extends AbstractView
{
    /**
     * View variables
     * @var array
     */
    protected array $variables;

    protected string $file = 'C:\Users\Sam\PhpstormProjects\Technodrive\module\Application\View\Application\Mock\index.phtml';

    protected string $template;

    protected string $html;

    public function setTemplate(string $templateName): void
    {
        $this->template = $templateName;
    }

    public function getTemplate(): string
    {
        return $this->template;
    }

    public function hasTemplate(): bool
    {
        return isset($this->template) && $this->template !== '';
    }

    /**
     * @return array
     */
    public function getVariables(): array
    {
        return $this->variables;
    }

    /**
     * @param array $variables
     * @return ViewModel
     */
    public function setVariables(array $variables): ViewModel
    {
        $this->variables = $variables;
        return $this;
    }

    /**
     * @return string
     */
    public function getFile(): string
    {
        return $this->file;
    }

    /**
     * @param string $file
     * @return ViewModel
     */
    public function setFile(string $file): ViewModel
    {
        $this->file = $file;
        return $this;
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