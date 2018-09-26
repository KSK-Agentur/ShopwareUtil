<?php

namespace Heptacom\Shopware\Util\ContainerAwares;

use Doctrine\DBAL\Connection;

/**
 * Interface IsDbalConnectionAware
 */
interface IsDbalConnectionAware
{
    /**
     * @return Connection
     */
    public function getDbalConnection();

    /**
     * @param Connection $connection
     *
     * @return $this
     */
    public function setDbalConnection(Connection $connection);
}
