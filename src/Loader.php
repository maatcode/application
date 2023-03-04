<?php
declare(strict_types=1);

namespace Maatcode\Application;

use League\Container\Container;
use Maatcode\Application\Http\Request;
use Maatcode\View\View;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class Loader
{
    /**
     * @var Container
     */
    protected static Container $container;

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public static function init(array $configuration, array $params = []): void
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

    /**
     * @return Container
     */
    public static function getContainer(): Container
    {
        return self::$container;
    }
}
