<?php

namespace Ez\RestBundle\Rest\ValueObjectVisitor;

use eZ\Publish\Core\REST\Common\Output\ValueObjectVisitor;
use eZ\Publish\Core\REST\Common\Output\Generator;
use eZ\Publish\Core\REST\Common\Output\Visitor;
use eZ\Publish\Core\REST\Common\Output\FieldTypeSerializer;



class RestFields extends ValueObjectVisitor
{
    /**
     * @var \eZ\Publish\Core\REST\Common\Output\FieldTypeSerializer
     */
    protected $fieldTypeSerializer;

    /**
     * @param \eZ\Publish\Core\REST\Common\Output\FieldTypeSerializer $fieldTypeSerializer
     */
    public function __construct( FieldTypeSerializer $fieldTypeSerializer )
    {
        $this->fieldTypeSerializer = $fieldTypeSerializer;
    }

    public function visit( Visitor $visitor, Generator $generator, $data )
    {
        $generator->startHashElement( 'Fields' );
        $generator->startList( 'field' );
        foreach ( $data->fields as $field )
        {
            $generator->startHashElement( 'field' );

            $generator->startValueElement( 'fieldDefinitionIdentifier', $field->fieldDefIdentifier );
            $generator->endValueElement( 'fieldDefinitionIdentifier' );

            $this->fieldTypeSerializer->serializeFieldValue(
                $generator,
                $data->contentId,
                $field
            );

            $generator->endHashElement( 'field' );
        }
        $generator->endList( 'field' );
        $generator->endHashElement( 'Fields' );
    }
}