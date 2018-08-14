<?php

namespace Heptacom\Shopware\Util\Components\Updater;

use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\ToolsException;
use Heptacom\Shopware\Util\ContainerAwares\IsModelManagerAware;

/**
 * Trait UpdatesDatabaseSchema
 */
trait UpdatesDatabaseSchema
{
    use IsModelManagerAware;

    /**
     * @param string[] $modelClasses
     *
     * @throws ToolsException
     */
    public function updateDatabaseSchemas(array $modelClasses)
    {
        /** @var ClassMetadata[] $modelSchemes */
        $modelSchemes = array_map([$this->getModelManager(), 'getClassMetadata'], $modelClasses);
        $tool = new SchemaTool($this->getModelManager());

        foreach ($modelSchemes as $schema) {
            $this->updateDatabaseSchema($tool, $schema);
        }
    }

    /**
     * @param SchemaTool    $tool
     * @param ClassMetadata $schema
     *
     * @throws ToolsException
     */
    public function updateDatabaseSchema(SchemaTool $tool, ClassMetadata $schema)
    {
        if ($this->getModelManager()->getConnection()->getSchemaManager()->tablesExist([$schema->getTableName()])) {
            $tool->updateSchema([$schema], true);
        } else {
            $tool->createSchema([$schema]);
        }
    }
}
