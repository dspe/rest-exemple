<?php

namespace Ez\RestBundle\Rest\InputParser;

use eZ\Publish\Core\REST\Server\Input\Parser\Base as BaseParser;
use eZ\Publish\Core\REST\Common\Input\ParsingDispatcher;
use Ez\RestBundle\Rest\Values\Hello;
use eZ\Publish\Core\REST\Common\Exceptions;


class Greetings extends BaseParser
{
    /**
     * @return Ez\RestBundle\Rest\Values\Hello
     */
    public function parse( array $data, ParsingDispatcher $parsingDispatcher )
    {
        // re-using the REST exceptions will make sure that those already have a ValueObjectVisitor
        if ( !isset( $data['name'] ) )
            throw new Exceptions\Parser( "Missing or invalid 'name' element for Greetings." );


        return new Hello( $data['name'] );
    }
}