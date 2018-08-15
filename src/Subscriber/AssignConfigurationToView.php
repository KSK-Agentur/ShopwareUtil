<?php

namespace Heptacom\Shopware\Util\Subscriber;

use Enlight\Event\SubscriberInterface;
use Enlight_Controller_Action;
use Enlight_Event_EventArgs;
use Heptacom\Shopware\Util\Services\SyntheticDependenciesProvider;
use Shopware\Components\Plugin\ConfigReader;

/**
 * Class AssignConfigurationToView
 */
class AssignConfigurationToView implements SubscriberInterface
{
    /**
     * @var SyntheticDependenciesProvider
     */
    private $syntheticDependenciesProvider;

    /**
     * @var ConfigReader
     */
    private $configReader;

    /**
     * @var string
     */
    private $pluginName;

    /**
     * AssignConfigurationToView constructor.
     *
     * @param SyntheticDependenciesProvider $syntheticDependenciesProvider
     * @param ConfigReader                  $configReader
     * @param string                        $pluginName
     */
    public function __construct(
        SyntheticDependenciesProvider $syntheticDependenciesProvider,
        ConfigReader $configReader,
        $pluginName
    ) {
        $this->syntheticDependenciesProvider = $syntheticDependenciesProvider;
        $this->configReader = $configReader;
        $this->pluginName = $pluginName;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PreDispatch' => ['assignConfiguration', PHP_INT_MIN],
        ];
    }

    /**
     * @param Enlight_Event_EventArgs $args
     */
    public function assignConfiguration(Enlight_Event_EventArgs $args)
    {
        /** @var Enlight_Controller_Action $controller */
        $controller = $args->get('subject');
        $config = $this->configReader->getByPluginName($this->configReader, $this->syntheticDependenciesProvider->getShopOrNull());

        $controller->View()->assign([
            $this->pluginName => [
                'config' => $config,
            ],
        ]);
    }
}
