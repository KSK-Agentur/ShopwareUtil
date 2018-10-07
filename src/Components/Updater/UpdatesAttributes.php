<?php

namespace Heptacom\Shopware\Util\Components\Updater;

use Doctrine\DBAL\Types\Type;
use Heptacom\Shopware\Util\ContainerAwares\HasAttributeCrud;
use Heptacom\Shopware\Util\ContainerAwares\HasAttributeTypeMapping;
use Shopware\Bundle\AttributeBundle\Service\ConfigurationStruct;

/**
 * Trait UpdatesAttributes
 */
trait UpdatesAttributes
{
    use HasAttributeCrud, HasAttributeTypeMapping;

    /**
     * @param string $table
     * @param string $name
     *
     * @return bool
     */
    public function hasAttribute($table, $name)
    {
        return $this->getAttributeCrud()->get($table, $this->prefixAttributeName($name)) instanceof ConfigurationStruct;
    }

    /**
     * @param string $table
     * @param string $name
     * @param string $type
     * @param array $options
     *
     * @throws \Exception
     *
     * @return $this
     */
    public function addAttribute($table, $name, $type, array $options = [])
    {
        if (!$this->hasAttribute($table, $name)) {
            $options = array_merge(
                [
                    'custom' => false,
                    'displayInBackend' => false,
                ],
                $options
            );

            $this->getAttributeCrud()->update($table, $this->prefixAttributeName($name), $type, $options);
        }

        return $this;
    }

    /**
     * @param string $table
     * @param string $name
     *
     * @throws \Doctrine\DBAL\DBALException
     *
     * @return $this
     */
    public function showAttribute($table, $name)
    {
        return $this->updateAttributeOptions($table, $name, ['displayInBackend' => true]);
    }

    /**
     * @param string $table
     * @param string $name
     *
     * @throws \Doctrine\DBAL\DBALException
     *
     * @return $this
     */
    public function hideAttribute($table, $name)
    {
        return $this->updateAttributeOptions($table, $name, ['displayInBackend' => false]);
    }

    /**
     * @param string $table
     * @param string $name
     * @param array $options
     *
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Exception
     *
     * @return $this
     */
    public function updateAttributeOptions($table, $name, array $options)
    {
        $config = $this->getAttributeCrud()->get($table, $this->prefixAttributeName($name));

        if ($config instanceof ConfigurationStruct) {
            $this->getAttributeCrud()->update($config->getTableName(), $config->getColumnName(), $config->getColumnType(), $options);
        }

        return $this;
    }

    /**
     * @param string $table
     * @param string $name
     *
     * @throws \Exception
     *
     * @return $this
     */
    public function removeAttribute($table, $name)
    {
        $this->getAttributeCrud()->delete($table, $this->prefixAttributeName($name));

        return $this;
    }

    /**
     * @param string $name
     *
     * @return string
     */
    public function prefixAttributeName($name)
    {
        return $name;
    }
}
