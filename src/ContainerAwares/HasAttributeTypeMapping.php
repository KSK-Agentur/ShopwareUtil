<?php

namespace Heptacom\Shopware\Util\ContainerAwares;

use Shopware\Bundle\AttributeBundle\Service\TypeMapping;

/**
 * Trait HasAttributeTypeMapping
 */
trait HasAttributeTypeMapping
{
    /** @var TypeMapping */
    private $attributeTypeMappingService;

    /**
     * @return TypeMapping
     */
    public function getAttributeTypeMapping()
    {
        return $this->attributeTypeMappingService;
    }

    /**
     * @param TypeMapping $attributeTypeMapping
     *
     * @return $this
     */
    public function setAttributeTypeMapping(TypeMapping $attributeTypeMapping)
    {
        $this->attributeTypeMappingService = $attributeTypeMapping;

        return $this;
    }
}
