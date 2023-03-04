<?php
declare(strict_types=1);

namespace Maatcode\Application\Controller;

use Maatcode\Application\Http\RequestInterface;
use Maatcode\View\ViewInterface;

class AbstractController
{
    /**
     * @var ViewInterface
     */
    protected ViewInterface $view;
    /**
     * @var RequestInterface
     */
    protected RequestInterface $request;
    /**
     * @var array
     */
    protected array $config;

    /**
     * @return ViewInterface
     */
    public function getView(): ViewInterface
    {
        return $this->view;
    }

    /**
     * @param ViewInterface $view
     * @return $this
     */
    public function setView(ViewInterface $view): AbstractController
    {
        $this->view = $view;
        return $this;
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @param array $config
     * @return $this
     */
    public function setConfig(array $config): AbstractController
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @return RequestInterface
     */
    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

    /**
     * @param RequestInterface $request
     * @return $this
     */
    public function setRequest(RequestInterface $request): AbstractController
    {
        $this->request = $request;
        return $this;
    }
}
