<?php

namespace Ez\RestBundle\Rest\Values;

class RestFields
{
    public $fields;
    public $contentId;

    public function __construct( $fields, $contentId )
    {
        $this->fields = $fields;
        $this->contentId = $contentId;
    }
}