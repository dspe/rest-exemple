<?php

namespace Ez\RestBundle\Rest\Values;

class Hello
{
    public $name;

    public function __construct( $name )
    {
        $this->name = $name;
    }
}