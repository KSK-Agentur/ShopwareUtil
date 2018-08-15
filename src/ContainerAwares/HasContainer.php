<?php

namespace Heptacom\Shopware\Util\ContainerAwares;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Trait HasContainer
 */
trait HasContainer
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @return ContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param ContainerInterface $container
     *
     * @return $this
     */
    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;

        return $this;
    }
}
