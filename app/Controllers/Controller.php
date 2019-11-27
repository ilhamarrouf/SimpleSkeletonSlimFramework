<?php

namespace App\Controllers;

abstract class Controller
{
    protected $container;

    /**
     * Create a new container instance
     *
     * @param $container
     * @return void
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * Dynamically access the properties
     *
     * @param string $property
     * @return mixed
     */
    public function __get($property)
    {
        if ($this->container->{$property}) {
            return $this->container->{$property};
        }
    }

    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
    }

    public function __isset($name)
    {
        // TODO: Implement __isset() method.
    }
}