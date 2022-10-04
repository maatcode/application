<?php

namespace Maatcode\Application\Module;

use Maatcode\Application\Config;
use Maatcode\Application\Http\Request;
use League\Container\Container;
use Maatcode\View\View;

abstract class AbstractModule
{
    protected View $view;
    protected Container $container;


    public function onBootstrap(Container $container) {
        $this->container = $container;
        $this->initConfig();
        $this->initView();
        $this->initServices();
    }

    public function initConfig() {
        Config::setConfig($this->getConfig());
        $this->container->add('config', Config::getConfig());
    }

    public function initView()
    {
        $config = $this->container->get('config');
        $this->view = new View();
        $this->view
            ->setRequest($this->container->get(Request::class))
            ->setConfig($config);
        $this->view->setLayout($config['view']['layout']);
        $this->container->add(View::class, $this->view);
    }



}
