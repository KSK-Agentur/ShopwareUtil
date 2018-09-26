<?php

namespace Heptacom\Shopware\Util\Components\Updater;

use Doctrine\DBAL\DBALException;
use Heptacom\Shopware\Util\ContainerAwares\HasDbalConnection;
use LogicException;

/**
 * Trait AlterDatabaseData
 */
trait AlterDatabaseData
{
    use HasDbalConnection;

    /**
     * @param $table
     * @param callable $transformer
     *
     * @throws DBALException
     * @throws LogicException
     */
    public function alterData($table, callable $transformer)
    {
        $connection = $this->getDbalConnection();
        $tableDetails = $connection->getSchemaManager()->listTableDetails($table);

        if (!$tableDetails->hasPrimaryKey()) {
            throw new LogicException('Table ' . $table . ' has no primary key');
        }

        $primaryKeys = $tableDetails->getPrimaryKeyColumns();
        $queryBuilder = $this->getAlterDatabaseDataConnection()->createQueryBuilder();
        $queryBuilder->from($table)->select(['*']);

        foreach ($queryBuilder->execute()->fetchAll(\PDO::FETCH_ASSOC) as $row) {
            $newData = call_user_func($transformer, $row);
            if ($newData != $row) {
                $changes = array_diff_assoc($newData, $row);
                $primerayKeyValues = array_intersect_key($row, array_fill_keys($primaryKeys, true));
                $connection->update($table, $changes, $primerayKeyValues);
            }
        }
    }
}
