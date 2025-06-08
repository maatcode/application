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

    protected array $config = [];

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
    protected function initServices(): void
    {
        $config = $this->getConfig();
        // Add controller factories
        $controllerFactories = $config['controllers']['factories'] ?? [];
        foreach ($controllerFactories as $controller => $factory) {
            $this->container->add($controller, (new $factory)($this->container));
        }
        // Add service factories
        $serviceFactories = $config['services']['factories'] ?? [];
        foreach ($serviceFactories as $service => $factory) {
            $this->container->add($service, (new $factory)($this->container));
        }
    }

    protected function getConfig(): array
    {
        return $this->config;
    }

    protected function setConfig(array $config): AbstractModule
    {
        $this->config = $config;
        return $this;
    }





}
