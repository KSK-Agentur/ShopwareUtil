<?php

namespace Heptacom\Shopware\Util\Services;

use Heptacom\Shopware\Util\ContainerAwares\HasContainer;
use Heptacom\Shopware\Util\ContainerAwares\IsContainerAware;
use Shopware\Models\Shop\Shop;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SyntheticDependenciesProvider implements IsContainerAware
{
    use HasContainer;

    const SYNTHETIC_SERVICE_SHOP = 'shop';

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
}
