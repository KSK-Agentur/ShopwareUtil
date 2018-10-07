<?php

namespace Heptacom\Shopware\Util\ContainerAwares;

use Symfony\Component\DependencyInjection\ContainerInterface;

trait InitsServiceAwareness
{
    /**
     * @param ContainerInterface $container
     *
     * @return $this
     */
    public function initServices(ContainerInterface $container)
    {
        if ($this instanceof IsAttributeCrudAware) {
            $this->setAttributeCrud($container->get('shopware_attribute.crud_service'));
        }

        if ($this instanceof IsAttributeTypeMappingAware) {
            $this->setAttributeTypeMapping($container->get('shopware_attribute.type_mapping'));
        }

        if ($this instanceof IsContainerAware) {
            $this->setContainer($container);
        }

        if ($this instanceof IsModelManagerAware) {
            $this->setModelManager($container->get('models'));
        }

        if ($this instanceof IsDbalConnectionAware) {
            $this->setDbalConnection($container->get('dbal_connection'));
        }

        return $this;
    }
}
