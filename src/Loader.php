<?php

namespace Maatcode\Application;

use League\Container\Container;
use Maatcode\Application\Http\Request;

use Maatcode\View\Factory\ViewFactory;
use Maatcode\View\Renderer\Render;
use Maatcode\View\View;

class Loader
{
    protected static Container $container;

    public static function init (array $configuration, array $params = [])
    {
        Config::setConfig($configuration);
        self::$container = new Container();
        $request = new Request();
        self::$container->add(
            Request::class,
            $request
        );

        $data = Module::init(
            self::$container,
            $params
        );
        self::$container->get(View::class)->render($data, $params);
    }

    public static function getContainer (): Container
    {
        return self::$container;
    }
}
