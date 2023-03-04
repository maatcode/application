<?php
declare(strict_types=1);

namespace Maatcode\Application;

use League\Container\Container;
use Maatcode\Application\Router\RouteManager;

class Module
{
    /**
     * @param Container $container
     * @param array $params
     * @return array|void
     */
    public static function init(Container $container, array $params = [])
    {
        $routeManager = new RouteManager();
        $modules = Config::getConfig('modules');
        $routing = [];
        foreach ($modules as $module)
        {
            $obj = '\\' . $module . '\Module';
            $object = new $obj();
            $object->onBootstrap($container);
            $routing += $object->getRouting();
        }
        try
        {
            return $routeManager->dispatch($routing, $container, $params) ?? [];
        } catch (Exception\NoRouteException $e)
        {
            trigger_error($e->getMessage(), E_USER_ERROR);
        }
    }
}
