<?php

namespace Heptacom\Shopware\Util\ContainerAwares;

use Shopware\Bundle\AttributeBundle\Service\CrudService;

/**
 * Interface IsAttributeCrudAware
 */
interface IsAttributeCrudAware
{
    /**
     * @return CrudService
     */
    public function getAttributeCrud();

    /**
     * @param CrudService $attributeCrud
     *
     * @return $this
     */
    public function setAttributeCrud(CrudService $attributeCrud);
}
