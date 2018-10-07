<?php

namespace Heptacom\Shopware\Util\ContainerAwares;

use Shopware\Bundle\AttributeBundle\Service\CrudService;

/**
 * Trait HasAttributeCrud
 */
trait HasAttributeCrud
{
    /** @var CrudService */
    private $attributeCrudService;

    /**
     * @return CrudService
     */
    public function getAttributeCrud()
    {
        return $this->attributeCrudService;
    }

    /**
     * @param CrudService $attributeCrud
     *
     * @return $this
     */
    public function setAttributeCrud(CrudService $attributeCrud)
    {
        $this->attributeCrudService = $attributeCrud;

        return $this;
    }
}
