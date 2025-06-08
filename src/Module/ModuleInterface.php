<?php
declare(strict_types=1);

namespace Maatcode\Application\Module;

use League\Container\Container;

interface ModuleInterface
{
    /**
     * @param Container $container
     * @return mixed
     */
    public function onBootstrap(Container $container);

    /**
     * @return mixed
     */
    public function getConfig();

    /**
     * @return mixed
     */
    public function initView();

    /**
     * @return mixed
     */
    public function getRouting();

    

}
