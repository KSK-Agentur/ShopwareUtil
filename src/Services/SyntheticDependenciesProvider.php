<?php

namespace Heptacom\Shopware\Util\Services;

use Heptacom\Shopware\Util\ContainerAwares\HasContainer;
use Heptacom\Shopware\Util\ContainerAwares\IsContainerAware;
use Shopware\Models\Shop\Shop;
use Shopware_Components_Modules;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SyntheticDependenciesProvider implements IsContainerAware
{
    use HasContainer;

    const SYNTHETIC_SERVICE_SHOP = 'shop';

    const SYNTHETIC_SERVICE_MODULES = 'modules';

    /**
     * SyntheticDependenciesProvider constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->setContainer($container);
    }

    /**
     * @return bool
     */
    public function hasShop()
    {
        return $this->getContainer()->has(self::SYNTHETIC_SERVICE_SHOP);
    }

    /**
     * @return Shop|null
     */
    public function getShopOrNull()
    {
        /* @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->getContainer()->get(self::SYNTHETIC_SERVICE_SHOP, ContainerInterface::NULL_ON_INVALID_REFERENCE);
    }

    /**
     * @return bool
     */
    public function hasModules()
    {
        return $this->getContainer()->has(self::SYNTHETIC_SERVICE_MODULES);
    }

    /**
     * @return Shopware_Components_Modules|null
     */
    public function getModulesOrNull()
    {
        /* @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->getContainer()->get(self::SYNTHETIC_SERVICE_MODULES, ContainerInterface::NULL_ON_INVALID_REFERENCE);
    }
}
