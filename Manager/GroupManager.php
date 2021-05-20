<?php
declare(strict_types=1);

namespace LSB\UserBundle\Manager;

use LSB\UserBundle\Entity\GroupInterface;
use LSB\UserBundle\Factory\GroupFactoryInterface;
use LSB\UserBundle\Repository\GroupRepositoryInterface;
use LSB\UtilityBundle\Factory\FactoryInterface;
use LSB\UtilityBundle\Form\BaseEntityType;
use LSB\UtilityBundle\Manager\ObjectManagerInterface;
use LSB\UtilityBundle\Manager\BaseManager;
use LSB\UtilityBundle\Repository\RepositoryInterface;

/**
* Class GroupManager
* @package LSB\UserBundle\Manager
*/
class GroupManager extends BaseManager
{

    /**
     * GroupManager constructor.
     * @param ObjectManagerInterface $objectManager
     * @param GroupFactoryInterface $factory
     * @param GroupRepositoryInterface $repository
     * @param BaseEntityType|null $form
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        GroupFactoryInterface $factory,
        GroupRepositoryInterface $repository,
        ?BaseEntityType $form
    ) {
        parent::__construct($objectManager, $factory, $repository, $form);
    }

    /**
     * @return GroupInterface|object
     */
    public function createNew(): GroupInterface
    {
        return parent::createNew();
    }

    /**
     * @return GroupFactoryInterface|FactoryInterface
     */
    public function getFactory(): GroupFactoryInterface
    {
        return parent::getFactory();
    }

    /**
     * @return GroupRepositoryInterface|RepositoryInterface
     */
    public function getRepository(): GroupRepositoryInterface
    {
        return parent::getRepository();
    }
}
