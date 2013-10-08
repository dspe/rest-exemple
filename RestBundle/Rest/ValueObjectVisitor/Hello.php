<?php

namespace Ez\RestBundle\Rest\ValueObjectVisitor;

use eZ\Publish\Core\REST\Common\Output\ValueObjectVisitor;
use eZ\Publish\Core\REST\Common\Output\Generator;
use eZ\Publish\Core\REST\Common\Output\Visitor;

class Hello extends ValueObjectVisitor
{
    public function visit( Visitor $visitor, Generator $generator, $data )
    {
        $generator->startObjectElement( 'Test' );

        $generator->startValueElement( 'Hello', $data->name );
        $generator->endValueElement( 'Hello' );

        $generator->endObjectElement( 'Test' );
    }
}