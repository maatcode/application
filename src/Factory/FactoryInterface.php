<?php
declare(strict_types=1);

namespace Maatcode\Application\Factory;

use League\Container\Container;

interface FactoryInterface
{
    public static function create(Container $container);
}
