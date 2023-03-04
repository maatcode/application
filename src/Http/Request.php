<?php
declare(strict_types=1);

namespace Maatcode\Application\Http;

use Maatcode\Application\Module\AbstractClass;

class Request extends AbstractClass implements RequestInterface
{
    /**
     * @var string
     */
    protected string $module;
    /**
     * @var string
     */
    protected string $controller;
    /**
     * @var string
     */
    protected string $action;
    /**
     * @var array
     */
    protected array $params;

    /**
     * @return string
     */
    public function getModule(): string
    {
        return $this->module;
    }

    /**
     * @param string $module
     * @return Request
     */
    public function setModule(string $module): Request
    {
        $this->module = $module;
        return $this;
    }

    /**
     * @return string
     */
    public function getController(): string
    {
        return $this->controller;
    }

    /**
     * @param string $controller
     * @return Request
     */
    public function setController(string $controller): Request
    {
        $this->controller = $controller;
        return $this;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @param string $action
     * @return Request
     */
    public function setAction(string $action): Request
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @param array $params
     * @return Request
     */
    public function setParams(array $params): Request
    {
        $this->params = $params;
        return $this;
    }

}
