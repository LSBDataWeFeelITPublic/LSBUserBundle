<?php
declare(strict_types=1);

namespace LSB\UserBundle\Entity;

use Doctrine\ORM\Mapping\MappedSuperclass;
use LSB\UtilityBundle\Traits\IdTrait;
use Doctrine\ORM\Mapping as ORM;


/**
 * Class UserGroupRelation
 * @package LSB\UserBundle\Entity
 *
 * @MappedSuperclass
 */
class UserGroupRelation implements UserGroupRelationInterface
{
    use IdTrait;

    /**
     * @ORM\ManyToOne(targetEntity="LSB\UserBundle\Entity\UserInterface", inversedBy="userGroupRelations")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    protected UserInterface $user;

    /**
     * @ORM\ManyToOne(targetEntity="LSB\UserBundle\Entity\UserGroupInterface", inversedBy="userGroupRelations")
     * @ORM\JoinColumn(name="user_group_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    protected UserGroupInterface $userGroup;

    /**
     * @return UserInterface
     */
    public function getUser(): UserInterface
    {
        return $this->user;
    }

    /**
     * @param UserInterface $user
     * @return UserGroupRelation
     */
    public function setUser(UserInterface $user): UserGroupRelation
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return UserGroupInterface
     */
    public function getUserGroup(): UserGroupInterface
    {
        return $this->userGroup;
    }

    /**
     * @param UserGroupInterface $userGroup
     * @return UserGroupRelation
     */
    public function setUserGroup(UserGroupInterface $userGroup): UserGroupRelation
    {
        $this->userGroup = $userGroup;
        return $this;
    }

}
