<?php
declare(strict_types=1);

namespace LSB\UserBundle\Manager;

use LSB\UserBundle\Entity\UserGroupRelationInterface;
use LSB\UserBundle\Factory\UserGroupRelationFactoryInterface;
use LSB\UserBundle\Repository\UserGroupRelationRepositoryInterface;
use LSB\UtilityBundle\Factory\FactoryInterface;
use LSB\UtilityBundle\Form\BaseEntityType;
use LSB\UtilityBundle\Manager\ObjectManagerInterface;
use LSB\UtilityBundle\Manager\BaseManager;
use LSB\UtilityBundle\Repository\RepositoryInterface;

/**
* Class UserGroupRelationManager
* @package LSB\UserBundle\Manager
*/
class UserGroupRelationManager extends BaseManager
{

    /**
     * UserGroupRelationManager constructor.
     * @param ObjectManagerInterface $objectManager
     * @param UserGroupRelationFactoryInterface $factory
     * @param UserGroupRelationRepositoryInterface $repository
     * @param BaseEntityType|null $form
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        UserGroupRelationFactoryInterface $factory,
        UserGroupRelationRepositoryInterface $repository,
        ?BaseEntityType $form
    ) {
        parent::__construct($objectManager, $factory, $repository, $form);
    }

    /**
     * @return UserGroupRelationInterface|object
     */
    public function createNew(): UserGroupRelationInterface
    {
        return parent::createNew();
    }

    /**
     * @return UserGroupRelationFactoryInterface|FactoryInterface
     */
    public function getFactory(): UserGroupRelationFactoryInterface
    {
        return parent::getFactory();
    }

    /**
     * @return UserGroupRelationRepositoryInterface|RepositoryInterface
     */
    public function getRepository(): UserGroupRelationRepositoryInterface
    {
        return parent::getRepository();
    }
}
