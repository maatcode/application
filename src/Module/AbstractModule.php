<?php
declare(strict_types=1);

namespace Maatcode\Application\Module;

use League\Container\Container;
use Maatcode\Application\Config;
use Maatcode\Application\Http\Request;
use Maatcode\View\View;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

abstract class AbstractModule
{
    /**
     * @var View
     */
    protected View $view;
    /**
     * @var Container
     */
    protected Container $container;

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function onBootstrap(Container $container): void
    {
        $this->container = $container;
        $this->initConfig();
        $this->initView();
        $this->initServices();
    }

    /**
     * @return void
     */
    public function initConfig(): void
    {
        Config::setConfig($this->getConfig());
        $this->container->add('config', Config::getConfig());
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function initView(): void
    {
        $config = $this->container->get('config');
        $this->view = new View();
        $this->view
            ->setRequest($this->container->get(Request::class))
            ->setConfig($config);
        $this->view->setLayout($config['view']['layout']);
        $this->container->add(View::class, $this->view);
    }

    /**
     * @return void
     */
    abstract public function initServices(): void;

    /**
     * @return mixed
     */
    abstract public function getConfig(): mixed;


}
