<?php

namespace Heptacom\Shopware\Util\Subscriber;

use Enlight\Event\SubscriberInterface;
use Enlight_Controller_Action;
use Enlight_Event_EventArgs;
use Heptacom\Shopware\Util\Services\PluginConfigReader;

/**
 * Class AssignConfigurationToView
 */
class AssignConfigurationToView implements SubscriberInterface
{
    /** @var PluginConfigReader */
    private $pluginConfigReader;

    /** @var string */
    private $pluginName;

    public function __construct(PluginConfigReader $pluginConfigReader, $pluginName)
    {
        $this->pluginConfigReader = $pluginConfigReader;
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
        $config = $this->pluginConfigReader->byDefault();

        $controller->View()->assign([
            $this->pluginName => [
                'config' => $config,
            ],
        ]);
    }
}
