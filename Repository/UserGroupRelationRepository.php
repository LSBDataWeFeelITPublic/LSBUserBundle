<?php
declare(strict_types=1);

namespace LSB\UserBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use LSB\UserBundle\Entity\UserGroupRelation;
use LSB\UtilityBundle\Repository\PaginationInterface;
use LSB\UtilityBundle\Repository\PaginationRepositoryTrait;

/**
 * Class UserGroupRelationRepository
 * @package LSB\UserBundle\Repository
 */
class UserGroupRelationRepository extends ServiceEntityRepository implements UserGroupRelationRepositoryInterface, PaginationInterface
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
