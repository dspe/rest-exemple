<?php

namespace Ez\RestBundle\Rest\Controller;

use eZ\Publish\Core\REST\Server\Controller as BaseController;
use Ez\RestBundle\Rest\Values\Hello as HelloValue;
use Ez\RestBundle\Rest\Values;
use eZ\Publish\Core\Repository\Values\Content\Content;

class DefaultController extends BaseController
{
    public function sayHello( $name )
    {
        return new HelloValue( $name );
    }

    public function contentFields( $contentId, $language = array( "eng-GB" ) )
    {
        $contentVersion = null;
        $fieldsList = array();

        if ( !is_array( $language ) )
        {
            $askLang = $language;
            $language = array( $language );
        }
        if ( is_numeric( $contentId ) )
        {
            $contentVersion = $this->repository->getContentService()->loadContent( $contentId, $language );
        }

        if ( $contentVersion instanceof Content )
        {
            $fields = $contentVersion->getFields();
        }

        $contentType = $this->repository->getContentTypeService()->loadContentType(
            $contentVersion->getVersionInfo()->getContentInfo()->contentTypeId
        );

        return new Values\RestFields(
            $fields,
            $contentType
        );

    }
}
