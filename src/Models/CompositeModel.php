<?php

abstract class CompositeModel {
    protected $attributes;

    public function __construct() {
        $this->attributes = array();
    }

    public function setAttribute($key, $value) {
        $this->attributes[$key] = $value;
    }

    public function getAttribute($key) {
        return $this->attributes[$key];
    }

    public function getAllAttributes() {
        return $this->attributes;
    }

    abstract public function save();
}