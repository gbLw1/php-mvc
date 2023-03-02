<?php

// Classe Component
abstract class Component
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    abstract public function render();
}