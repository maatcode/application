<?php
declare(strict_types=1);

namespace Maatcode\Application\Http;

interface RequestInterface
{
    /**
     * @return string
     */
    public function getModule(): string;

    /**
     * @param string $module
     * @return Request
     */
    public function setModule(string $module): Request;

    /**
     * @return string
     */
    public function getController(): string;

    /**
     * @param string $controller
     * @return Request
     */
    public function setController(string $controller): Request;

    /**
     * @return string
     */
    public function getAction(): string;

    /**
     * @param string $action
     * @return Request
     */
    public function setAction(string $action): Request;

    /**
     * @return array
     */
    public function getParams(): array;

    /**
     * @param array $params
     * @return Request
     */
    public function setParams(array $params): Request;
}
