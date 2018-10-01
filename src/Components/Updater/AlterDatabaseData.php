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
     * @param string   $table
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
        $queryBuilder = $this->getDbalConnection()->createQueryBuilder();
        $queryBuilder->from($table)->select(['*']);

        foreach ($queryBuilder->execute()->fetchAll(\PDO::FETCH_ASSOC) as $row) {
            $newData = call_user_func($transformer, $row);
            if ($newData != $row) {
                $changes = array_diff_assoc($newData, $row);
                $primaryKeyValues = array_intersect_key($row, array_fill_keys($primaryKeys, true));
                $connection->update($table, $changes, $primaryKeyValues);
            }
        }
    }

    /**
     * @param string   $table
     * @param callable $predicate
     *
     * @throws DBALException
     * @throws LogicException
     */
    public function deleteData($table, callable $predicate)
    {
        $connection = $this->getDbalConnection();
        $tableDetails = $connection->getSchemaManager()->listTableDetails($table);

        if (!$tableDetails->hasPrimaryKey()) {
            throw new LogicException('Table ' . $table . ' has no primary key');
        }

        $primaryKeys = $tableDetails->getPrimaryKeyColumns();
        $queryBuilder = $this->getDbalConnection()->createQueryBuilder();
        $queryBuilder->from($table)->select(['*']);

        foreach ($queryBuilder->execute()->fetchAll(\PDO::FETCH_ASSOC) as $row) {
            if (call_user_func($predicate, $row)) {
                $primaryKeyValues = array_intersect_key($row, array_fill_keys($primaryKeys, true));
                $connection->delete($table, $primaryKeyValues);
            }
        }
    }
}
