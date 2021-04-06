<?php
declare(strict_types=1);

namespace LSB\UserBundle\Repository;

use LSB\UserBundle\Entity\UserInterface;
use LSB\UtilityBundle\Repository\RepositoryInterface;

/**
 * Interface UserRepositoryInterface
 * @package LSB\UserBundle\Repository
 */
interface UserRepositoryInterface extends RepositoryInterface
{

    public function findOneBy(array $criteria, array $orderBy = null): ?UserInterface;

}
