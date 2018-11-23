<?php

namespace Tenolo\Bundle\TwigExtensionsBundle\Service;

/**
 * Class TwigGlobalsManager
 *
 * @package Tenolo\Bundle\TwigExtensionsBundle\Service
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class TwigGlobalsManager
{

    /** @var array */
    protected $globals = [];

    /**
     * @param $name
     * @param $value
     */
    public function addGlobal($name, $value)
    {
        $this->globals[$name] = $value;
    }

    /**
     * @param $values
     */
    public function addGlobals($values)
    {
        foreach ($values as $key => $value) {
            $this->addGlobal($key, $value);
        }
    }

    /**
     * @return array
     */
    public function getGlobals()
    {
        return $this->globals;
    }

}
