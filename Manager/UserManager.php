<?php
declare(strict_types=1);

namespace LSB\UserBundle\Manager;

use LSB\UserBundle\Entity\UserInterface;
use LSB\UserBundle\Factory\UserFactoryInterface;
use LSB\UserBundle\Repository\UserRepositoryInterface;
use LSB\UtilityBundle\Factory\FactoryInterface;
use LSB\UtilityBundle\Form\BaseEntityType;
use LSB\UtilityBundle\Manager\ObjectManagerInterface;
use LSB\UtilityBundle\Manager\BaseManager;
use LSB\UtilityBundle\Repository\RepositoryInterface;

/**
 * Class UserManager
 * @package LSB\UserBundle\Manager
 */
class UserManager extends BaseManager
{

    /**
     * UserManager constructor.
     * @param ObjectManagerInterface $objectManager
     * @param UserFactoryInterface $factory
     * @param UserRepositoryInterface $repository
     * @param BaseEntityType|null $form
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        UserFactoryInterface $factory,
        UserRepositoryInterface $repository,
        ?BaseEntityType $form
    ) {
        parent::__construct($objectManager, $factory, $repository, $form);
    }

    /**
     * @return UserInterface|object
     */
    public function createNew(): UserInterface
    {
        return parent::createNew();
    }

    /**
     * @return UserFactoryInterface|FactoryInterface
     */
    public function getFactory(): UserFactoryInterface
    {
        return $this->factory;
    }

    /**
     * @return UserRepositoryInterface|RepositoryInterface
     */
    public function getRepository(): UserRepositoryInterface
    {
        if (!$this->repository instanceof UserRepositoryInterface) {
            throw new \Exception('Missing repository service');
        }

        return $this->repository;
    }
}