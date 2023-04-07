<?php

namespace Technodrive\Mvc;

use Technodrive\Mvc\Exception\TemplateNotFoundException;
use Technodrive\Mvc\interface\ViewInterface;

/**
 *
 */
abstract class AbstractView implements ViewInterface
{

    /**
     * @var string
     */
    protected string $template;

    /**
     * @var array
     */
    protected array $variables;

    /**
     * @param array|null $variables
     */
    public function __construct(?array $variables = [])
    {
        $this->setVariables($variables);
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return void
     */
    public function __call(string $name, array $arguments )
    {

    }

    /**
     * set variable value
     * @var string key
     * @var mixed value
     */
    public function __set(string $key, mixed $value): void
    {
        $this->setVariable($key, $value);
    }

    /**
     * @param string $name
     * @return mixed|string
     */
    public function __get(string $name)
    {
        return $this->variables[$name]??'';
    }



    public function __isset(string $name)
    {
        return $this->hasVariable($name);
    }


    /**
     * @param array $variables
     * @return $this
     */
    protected function setVariables(array $variables): self
    {
        foreach ($variables as $key => $value) {
            $this->setVariable((string)$key, $value);
        }
        return $this;
    }

    protected function getVariables(): array
    {
        return $this->variables;
    }

    /**
     * Set view variable
     *
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function setVariable(string $name, mixed $value): void
    {
        $this->variables[$name] = $value;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function hasVariable(string $key): bool
    {
        return isset($this->variables[$key]);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getVariable(string $key): mixed
    {
        return $this->variables[$key];
    }

}