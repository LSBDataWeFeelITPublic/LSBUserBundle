<?php
declare(strict_types=1);

namespace LSB\UserBundle\Repository;

use Doctrine\Persistence\ManagerRegistry;
use LSB\UserBundle\Entity\Group;
use LSB\UtilityBundle\Repository\BaseRepository;
use LSB\UtilityBundle\Repository\PaginationRepositoryTrait;

/**
 * Class GroupRepository
 * @package LSB\UserBundle\Repository
 */
class GroupRepository extends BaseRepository implements GroupRepositoryInterface
{
    use PaginationRepositoryTrait;

    /**
     * GroupRepository constructor.
     * @param ManagerRegistry $registry
     * @param string|null $stringClass
     */
    public function __construct(ManagerRegistry $registry, ?string $stringClass = null)
    {
        parent::__construct($registry, $stringClass ?? Group::class);
    }

}
