<?php

namespace Heptacom\Shopware\Util\Subscriber;

use Enlight\Event\SubscriberInterface;
use Enlight_Template_Manager;

/**
 * Class AddTemplateDirectory
 */
class AddTemplateDirectory implements SubscriberInterface
{
    /**
     * @var Enlight_Template_Manager
     */
    private $templateManager;

    /**
     * @var string
     */
    private $templateDirectory;

    /**
     * AddTemplateDirectory constructor.
     *
     * @param Enlight_Template_Manager $templateManager
     * @param string                   $templateDirectory
     */
    public function __construct(Enlight_Template_Manager $templateManager, $templateDirectory)
    {
        $this->templateManager = $templateManager;
        $this->templateDirectory = $templateDirectory;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PreDispatch' => 'addTemplateDir',
        ];
    }

    public function addTemplateDir()
    {
        $this->templateManager->addTemplateDir($this->templateDirectory);
    }
}
