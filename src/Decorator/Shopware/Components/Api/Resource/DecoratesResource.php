<?php

namespace Heptacom\Shopware\Util\Decorator\Shopware\Components\Api\Resource;

use Shopware\Components\Model\ModelManager;
use Shopware_Components_Acl;

/**
 * Trait DecoratesResource
 *
 * @property object $decorated
 */
trait DecoratesResource
{
    /**
     * {@inheritdoc}
     */
    public function getContainer()
    {
        return $this->decorated->getContainer();
    }

    /**
     * {@inheritdoc}
     */
    public function setContainer($container)
    {
        return $this->decorated->setContainer($container);
    }

    /**
     * {@inheritdoc}
     */
    public function checkPrivilege($privilege)
    {
        return $this->decorated->checkPrivilege($privilege);
    }

    /**
     * {@inheritdoc}
     */
    public function setManager(ModelManager $manager)
    {
        return $this->decorated->setManager($manager);
    }

    /**
     * {@inheritdoc}
     */
    public function getManager()
    {
        return $this->decorated->getManager();
    }

    /**
     * {@inheritdoc}
     */
    public function setAcl(Shopware_Components_Acl $acl)
    {
        return $this->decorated->setAcl($acl);
    }

    /**
     * {@inheritdoc}
     */
    public function getAcl()
    {
        return $this->decorated->getAcl();
    }

    /**
     * {@inheritdoc}
     */
    public function setRole($role)
    {
        return $this->decorated->setRole($role);
    }

    /**
     * {@inheritdoc}
     */
    public function getRole()
    {
        return $this->decorated->getRole();
    }

    /**
     * {@inheritdoc}
     */
    public function setAutoFlush($autoFlush)
    {
        return $this->decorated->setAutoFlush($autoFlush);
    }

    /**
     * {@inheritdoc}
     */
    public function getAutoFlush()
    {
        return $this->decorated->getAutoFlush();
    }

    /**
     * {@inheritdoc}
     */
    public function setResultMode($resultMode)
    {
        return $this->decorated->setResultMode($resultMode);
    }

    /**
     * {@inheritdoc}
     */
    public function getResultMode()
    {
        return $this->decorated->getResultMode();
    }

    /**
     * {@inheritdoc}
     */
    public function flush($entity = null)
    {
        return $this->decorated->flush($entity);
    }

    /**
     * {@inheritdoc}
     */
    public function batchDelete($data)
    {
        return $this->decorated->batchDelete($data);
    }

    /**
     * {@inheritdoc}
     */
    public function batch($data)
    {
        return $this->decorated->batch($data);
    }
}
