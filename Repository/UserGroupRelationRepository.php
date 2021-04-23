<?php
declare(strict_types=1);

namespace LSB\UserBundle\Repository;

use Doctrine\Persistence\ManagerRegistry;
use LSB\UserBundle\Entity\UserGroupRelation;
use LSB\UtilityBundle\Repository\BaseRepository;
use LSB\UtilityBundle\Repository\PaginationInterface;
use LSB\UtilityBundle\Repository\PaginationRepositoryTrait;

/**
 * Class UserGroupRelationRepository
 * @package LSB\UserBundle\Repository
 */
class UserGroupRelationRepository extends BaseRepository implements UserGroupRelationRepositoryInterface, PaginationInterface
{
    use PaginationRepositoryTrait;

    /**
     * UserGroupRelationRepository constructor.
     * @param ManagerRegistry $registry
     * @param string|null $stringClass
     */
    public function __construct(ManagerRegistry $registry, ?string $stringClass = null)
    {
        parent::__construct($registry, $stringClass ?? UserGroupRelation::class);
    }

}
