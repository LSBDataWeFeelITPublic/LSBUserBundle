<?php
declare(strict_types=1);

namespace LSB\UserBundle\Repository;

use Doctrine\Persistence\ManagerRegistry;
use LSB\UserBundle\Entity\UserGroup;
use LSB\UtilityBundle\Repository\BaseRepository;
use LSB\UtilityBundle\Repository\PaginationRepositoryTrait;

/**
 * Class UserGroupRepository
 * @package LSB\UserBundle\Repository
 */
class UserGroupRepository extends BaseRepository implements UserGroupRepositoryInterface
{
    use PaginationRepositoryTrait;

    /**
     * UserGroupRepository constructor.
     * @param ManagerRegistry $registry
     * @param string|null $stringClass
     */
    public function __construct(ManagerRegistry $registry, ?string $stringClass = null)
    {
        parent::__construct($registry, $stringClass ?? UserGroup::class);
    }

}
