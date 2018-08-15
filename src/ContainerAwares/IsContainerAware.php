<?php

namespace Heptacom\Shopware\Util\ContainerAwares;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Interface IsContainerAware
 */
interface IsContainerAware
{
    /**
     * @return ContainerInterface
     */
    public function getContainer();

    /**
     * @param ContainerInterface $container
     *
     * @return $this
     */
    public function setContainer(ContainerInterface $container);
}
