<?php

namespace Heptacom\Shopware\Util\ContainerAwares;

use Shopware\Components\Model\ModelManager;

/**
 * Trait IsModelManagerAware
 */
trait IsModelManagerAware
{
    /**
     * @var ModelManager
     */
    private $modelManagerService;

    /**
     * @return ModelManager
     */
    public function getModelManager()
    {
        return $this->modelManagerService;
    }

    /**
     * @param ModelManager $modelManagerService
     *
     * @return $this
     */
    public function setModelManager(ModelManager $modelManagerService)
    {
        $this->modelManagerService = $modelManagerService;

        return $this;
    }
}
