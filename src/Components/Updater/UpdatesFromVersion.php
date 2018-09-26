<?php

namespace Heptacom\Shopware\Util\Components\Updater;

use RuntimeException;
use Shopware\Components\Plugin\Context\UpdateContext;

/**
 * Trait UpdatesFromVersion
 */
trait UpdatesFromVersion
{
    /** @var UpdateContext */
    protected $updateContext;

    /**
     * @return UpdateContext
     */
    public function getUpdateContext()
    {
        return $this->updateContext;
    }

    /**
     * @param UpdateContext $updateContext
     *
     * @return UpdatesFromVersion
     */
    public function setUpdateContext(UpdateContext $updateContext)
    {
        $this->updateContext = $updateContext;

        return $this;
    }

    /**
     * @param string $version
     * @param callable $action
     * @param mixed ...$params
     *
     * @throws RuntimeException
     *
     * @return $this
     */
    public function updateSinceVersion($version, callable $action, ...$params)
    {
        if (!$this->getUpdateContext() instanceof UpdateContext) {
            throw new RuntimeException('updateContext is not set');
        }

        if (version_compare($this->getUpdateContext()->getCurrentVersion(), $version, '<')) {
            call_user_func($action, ...$params);
        }

        return $this;
    }
}
