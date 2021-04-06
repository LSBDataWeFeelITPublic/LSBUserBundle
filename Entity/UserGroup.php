<?php
declare(strict_types=1);

namespace LSB\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use LSB\UtilityBundle\Traits\CreatedUpdatedTrait;
use Doctrine\ORM\Mapping\MappedSuperclass;
use LSB\UtilityBundle\Traits\UuidTrait;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Class Group
 * @package LSB\UserBundle\Entity
 *
 * @MappedSuperclass
 */
class UserGroup implements UserGroupInterface
{
    use UuidTrait;
    use CreatedUpdatedTrait;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     * @Assert\Length(max=100)
     */
    protected string $name;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    protected ?array $roles;

    /**
     * @var Collection|UserGroupRelationInterface[]
     * @ORM\OneToMany(targetEntity="LSB\UserBundle\Entity\UserGroupRelationInterface", mappedBy="userGroup", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected Collection $userGroupRelations;


    public function __construct()
    {
        $this->userGroupRelations = new ArrayCollection();
        $this->roles = [];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return UserGroup
     */
    public function setName(string $name): UserGroup
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getRoles(): ?array
    {
        return array_unique($this->roles);
    }

    /**
     * @param array|null $roles
     * @return UserGroup
     */
    public function setRoles(?array $roles): UserGroup
    {
        $this->roles = $roles;
        return $this;
    }

    /**
     * @param string $role
     * @return $this
     */
    public function addRole(string $role): UserGroup
    {
        $role = strtoupper($role);

        if (!in_array($role, $this->roles, true)) {
            $this->roles[] = $role;
        }

        return $this;
    }

    /**
     * @param string $role
     * @return bool
     */
    public function hasRole(string $role): bool
    {
        return in_array(strtoupper($role), $this->getRoles(), true);
    }

    /**
     * @return Collection|UserGroupRelationInterface[]
     */
    public function getUserGroupRelations()
    {
        return $this->userGroupRelations;
    }

    /**
     * @param Collection|UserGroupRelationInterface[] $userGroupRelations
     * @return UserGroup
     */
    public function setUserGroupRelations($userGroupRelations)
    {
        $this->userGroupRelations = $userGroupRelations;
        return $this;
    }

}
