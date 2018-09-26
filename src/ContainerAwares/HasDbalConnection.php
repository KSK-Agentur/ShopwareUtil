<?php

namespace Heptacom\Shopware\Util\ContainerAwares;

use Doctrine\DBAL\Connection;

/**
 * Trait HasDbalConnection
 */
trait HasDbalConnection
{
    /** @var Connection */
    private $dbalConnectionService;

    /**
     * @return Connection
     */
    public function getDbalConnection()
    {
        return $this->dbalConnectionService;
    }

    /**
     * @param Connection $connection
     *
     * @return $this
     */
    public function setDbalConnection(Connection $connection)
    {
        $this->dbalConnectionService = $connection;

        return $this;
    }
}
