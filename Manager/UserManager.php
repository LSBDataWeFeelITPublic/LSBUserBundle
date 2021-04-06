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
        return parent::getFactory();
    }

    /**
     * @return UserRepositoryInterface|RepositoryInterface
     */
    public function getRepository(): UserRepositoryInterface
    {
        return parent::getRepository();
    }

    /**
     * @return string
     */
    public function getClass(): string
    {
        return UserInterface::class;
    }

    /**
     * @param array $criteria
     * @return UserInterface|null
     */
    public function findUserBy(array $criteria): ?UserInterface
    {
        return $this->getRepository()->findOneBy($criteria);
    }

    /**
     * @param string $username
     * @return UserInterface|null
     */
    public function findUserByUsername(string $username): ?UserInterface
    {
        return $this->getRepository()->findOneBy(['username' => $username]);
    }
}
