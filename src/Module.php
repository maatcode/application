<?php

namespace Maatcode\Application;
use Maatcode\Application\Http\Request;
use Maatcode\Application\Router\RouteManager;
use League\Container\Container;

class Module
{
    public static function init (Container $container, array $params = []) {
        $routeManager = new RouteManager();
        $modules = Config::getConfig('modules');
        $routing = [];
        foreach ($modules as $module) {
            $obj = '\\' . $module . '\Module';
            $object = new $obj();
            $object->onBootstrap($container);
            $routing += $object->getRouting();
        }
        try {
            return $routeManager->dispatch($routing, $container, $params) ?? [];
        } catch (Exception\NoRouteException $e) {
            var_dump($e->getMessage());
        }

    }
}
