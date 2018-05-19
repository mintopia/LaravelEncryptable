<?php

namespace Cheezykins\LaravelEncryptable\Test\Mocks;


abstract class MockModel
{
    public $attributes;

    public function getAttribute($key)
    {
        return $this->attributes[$key];
    }

    public function setAttribute($key, $value)
    {
        $this->attributes[$key] = $value;
    }

    public function attributesToArray()
    {
        return $this->attributes;
    }
}