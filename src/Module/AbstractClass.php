<?php
declare(strict_types=1);

namespace Maatcode\Application\Module;

class AbstractClass
{
    /**
     * @param array $array
     * @return void
     */
    public function setProps(array $array): void
    {
        foreach ($array as $key => $value)
        {
            if (property_exists($this, $key))
            {
                $this->{$key} = $value;
            }
        }
    }
}
