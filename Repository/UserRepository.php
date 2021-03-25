<?php
declare(strict_types=1);

namespace LSB\UserBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use LSB\UserBundle\Entity\User;
use LSB\UtilityBundle\Repository\PaginationInterface;
use LSB\UtilityBundle\Repository\PaginationRepositoryTrait;

/**
 * Class UserRepository
 * @package LSB\UserBundle\Repository
 */
class UserRepository extends ServiceEntityRepository implements UserRepositoryInterface, PaginationInterface
{
    use PaginationRepositoryTrait;

    /**
     * UserRepository constructor.
     * @param ManagerRegistry $registry
     * @param string|null $stringClass
     */
    public function __construct(ManagerRegistry $registry, ?string $stringClass = null)
    {
        parent::__construct($registry, $stringClass ?? User::class);
    }

}
