<?php

namespace Heptacom\Shopware\Util\ContainerAwares;

use Shopware\Components\Model\ModelManager;

/**
 * Interface IsModelManagerAware
 */
interface IsModelManagerAware
{
    /**
     * @return ModelManager
     */
    public function getModelManager();

    /**
     * @param ModelManager $modelManagerService
     *
     * @return $this
     */
    public function setModelManager(ModelManager $modelManagerService);
}
