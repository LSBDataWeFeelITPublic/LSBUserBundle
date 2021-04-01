<?php
declare(strict_types=1);

namespace LSB\UserBundle\Manager;

use LSB\UserBundle\Entity\UserGroupInterface;
use LSB\UserBundle\Factory\UserGroupFactoryInterface;
use LSB\UserBundle\Repository\UserGroupRepositoryInterface;
use LSB\UtilityBundle\Factory\FactoryInterface;
use LSB\UtilityBundle\Form\BaseEntityType;
use LSB\UtilityBundle\Manager\ObjectManagerInterface;
use LSB\UtilityBundle\Manager\BaseManager;
use LSB\UtilityBundle\Repository\RepositoryInterface;

/**
* Class UserGroupManager
* @package LSB\UserBundle\Manager
*/
class UserGroupManager extends BaseManager
{

    /**
     * UserGroupManager constructor.
     * @param ObjectManagerInterface $objectManager
     * @param UserGroupFactoryInterface $factory
     * @param UserGroupRepositoryInterface $repository
     * @param BaseEntityType|null $form
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        UserGroupFactoryInterface $factory,
        UserGroupRepositoryInterface $repository,
        ?BaseEntityType $form
    ) {
        parent::__construct($objectManager, $factory, $repository, $form);
    }

    /**
     * @return UserGroupInterface|object
     */
    public function createNew(): UserGroupInterface
    {
        return parent::createNew();
    }

    /**
     * @return UserGroupFactoryInterface|FactoryInterface
     */
    public function getFactory(): UserGroupFactoryInterface
    {
        return parent::getFactory();
    }

    /**
     * @return UserGroupRepositoryInterface|RepositoryInterface
     */
    public function getRepository(): UserGroupRepositoryInterface
    {
        return parent::getRepository();
    }
}
