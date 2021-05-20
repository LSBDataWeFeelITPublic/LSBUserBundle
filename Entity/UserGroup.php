<?php
declare(strict_types=1);

namespace LSB\UserBundle\Entity;

use Doctrine\ORM\Mapping\MappedSuperclass;
use LSB\UtilityBundle\Traits\IdTrait;
use Doctrine\ORM\Mapping as ORM;


/**
 * Class UserGroup
 * @package LSB\UserBundle\Entity
 *
 * @MappedSuperclass
 */
class UserGroup implements UserGroupInterface
{
    use IdTrait;

    /**
     * @ORM\ManyToOne(targetEntity="LSB\UserBundle\Entity\UserInterface", inversedBy="userGroups")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    protected UserInterface $user;

    /**
     * @ORM\ManyToOne(targetEntity="LSB\UserBundle\Entity\GroupInterface", inversedBy="userGroups")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    protected GroupInterface $group;

    /**
     * @return UserInterface
     */
    public function getUser(): UserInterface
    {
        return $this->user;
    }

    /**
     * @param UserInterface $user
     * @return UserGroup
     */
    public function setUser(UserInterface $user): UserGroup
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return GroupInterface
     */
    public function getGroup(): GroupInterface
    {
        return $this->group;
    }

    /**
     * @param GroupInterface $group
     * @return UserGroup
     */
    public function setGroup(GroupInterface $group): UserGroup
    {
        $this->group = $group;
        return $this;
    }

}
