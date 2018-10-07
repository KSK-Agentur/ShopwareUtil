<?php

namespace Heptacom\Shopware\Util\ContainerAwares;

use Shopware\Bundle\AttributeBundle\Service\TypeMapping;

/**
 * Interface IsAttributeTypeMappingAware
 */
interface IsAttributeTypeMappingAware
{
    /**
     * @return TypeMapping
     */
    public function getAttributeTypeMapping();

    /**
     * @param TypeMapping $attributeTypeMapping
     *
     * @return $this
     */
    public function setAttributeTypeMapping(TypeMapping $attributeTypeMapping);
}
