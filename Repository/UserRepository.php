<?php
declare(strict_types=1);

namespace LSB\UserBundle\Repository;

use Doctrine\Persistence\ManagerRegistry;
use LSB\UserBundle\Entity\User;
use LSB\UtilityBundle\Repository\BaseRepository;
use LSB\UtilityBundle\Repository\PaginationRepositoryTrait;

/**
 * Class UserRepository
 * @package LSB\UserBundle\Repository
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
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
