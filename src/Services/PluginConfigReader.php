<?php

namespace Heptacom\Shopware\Util\Services;

use Shopware\Bundle\StoreFrontBundle\Struct\ShopContextInterface;
use Shopware\Components\Model\ModelManager;
use Shopware\Components\Plugin\ConfigReader;
use Shopware\Models\Shop\Shop;

class PluginConfigReader
{
    /** @var SyntheticDependenciesProvider */
    private $dependenciesProvider;

    /** @var ModelManager */
    private $modelManager;

    /** @var ConfigReader */
    private $configReader;

    /** @var string */
    private $pluginName;

    /**
     * @param SyntheticDependenciesProvider $dependenciesProvider
     * @param ModelManager                  $modelManager
     * @param ConfigReader                  $configReader
     * @param string                        $pluginName
     */
    public function __construct(
        SyntheticDependenciesProvider $dependenciesProvider,
        ModelManager $modelManager,
        ConfigReader $configReader,
        $pluginName
    ) {
        $this->dependenciesProvider = $dependenciesProvider;
        $this->modelManager = $modelManager;
        $this->configReader = $configReader;
        $this->pluginName = $pluginName;
    }

    /**
     * @param Shop $shop
     * @return array
     */
    public function byOrm(Shop $shop)
    {
        return $this->configReader->getByPluginName($this->pluginName, $shop);
    }

    /**
     * @param ShopContextInterface $shop
     * @return array
     */
    public function byContext(ShopContextInterface $shop)
    {
        return $this->byId($shop->getShop()->getId());
    }

    /**
     * @param int $shopId
     * @return array
     */
    public function byId($shopId)
    {
        try {
            return $this->byOrm($this->modelManager->find(Shop::class, $shopId));
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * @return array
     */
    public function byDefault()
    {
        return $this->configReader->getByPluginName($this->pluginName, $this->dependenciesProvider->getShopOrNull());
    }
}
