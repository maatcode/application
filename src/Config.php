<?php
declare(strict_types=1);

namespace Maatcode\Application;

class Config
{
    /**
     * @var array
     */
    public static array $config = [];

    /**
     * @param $key
     * @return array
     */
    public static function getConfig($key = null): array
    {
        if ($key)
        {
            return static::$config[$key];
        }
        return static::$config;
    }

    /**
     * @param array $config
     * @return void
     */
    public static function setConfig(array $config): void
    {
        static::$config = array_merge_recursive(static::$config, $config);
    }

}
