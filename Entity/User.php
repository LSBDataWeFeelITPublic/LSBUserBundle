<?php
declare(strict_types=1);

namespace LSB\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use LSB\ContractorBundle\Entity\ContractorInterface;
use LSB\UtilityBundle\Traits\CreatedUpdatedTrait;
use Doctrine\ORM\Mapping\MappedSuperclass;
use LSB\UtilityBundle\Traits\UuidTrait;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class User
 * @package LSB\UserBundle\Entity
 *
 * @MappedSuperclass
 */
class User implements UserInterface
{
    use UuidTrait;
    use CreatedUpdatedTrait;

    /**
     * @var bool
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected bool $isEnabled;

    /**
     * @var string
     * @ORM\Column(type="string", length=100, nullable=false)
     * @Assert\Length(max=100)
     */
    protected string $username;

    /**
     * @var string
     * @ORM\Column(type="string", length=100, nullable=false)
     * @Assert\Length(max=100)
     */
    protected string $email;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Assert\Length(max=100)
     */
    protected ?string $firstName;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Assert\Length(max=100)
     */
    protected ?string $lastName;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\Length(max=255)
     */
    protected string $password;

    /**
     * @var string|null
     */
    protected ?string $plainPassword;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\Length(max=255)
     */
    protected string $salt;

    /**
     * @var array|null
     * @ORM\Column(type="array", nullable=true)
     */
    protected ?array $roles;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    protected ?string $confirmationToken;

    /**
     * @var \DateTime|null
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected ?\DateTime $lastLogin;

    /**
     * @var Collection|UserGroupInterface[]
     * @ORM\OneToMany(targetEntity="LSB\UserBundle\Entity\UserGroupInterface", mappedBy="user", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected Collection $userGroups;

    /**
     * @var ContractorInterface|null
     * @ORM\ManyToOne(targetEntity="LSB\ContractorBundle\Entity\ContractorInterface")
     */
    protected ?ContractorInterface $defaultBillingContractor = null;

    /**
     * @var ContractorInterface|null
     * @ORM\ManyToOne(targetEntity="LSB\ContractorBundle\Entity\ContractorInterface")
     */
    protected ?ContractorInterface $defaultDeliveryContractor = null;

    /**
     * @var ContractorInterface|null
     * @ORM\ManyToOne(targetEntity="LSB\ContractorBundle\Entity\ContractorInterface")
     */
    protected ?ContractorInterface $defaultRecipientContractor = null;


    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->generateUuid();
        $this->isEnabled = false;
        $this->roles = [];
        $this->userGroups = new ArrayCollection();
        $this->salt = rtrim(str_replace('+', '.', base64_encode(random_bytes(32))), '=');
    }

    /**
     * @throws \Exception
     */
    public function __clone()
    {
        if ($this->getId()) {
            $this->id = null;
        }
        $this->generateUuid($force = true);
    }

    /**
     * @return string|null
     */
    public function getUserIdentifier(): ?string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->getUsername();
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->isEnabled;
    }

    /**
     * @param bool $isEnabled
     * @return self
     */
    public function setIsEnabled(bool $isEnabled): self
    {
        $this->isEnabled = $isEnabled;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return self
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     * @return self
     */
    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     * @return self
     */
    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return self
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    /**
     * @param string|null $plainPassword
     * @return self
     */
    public function setPlainPassword(?string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;
        return $this;
    }

    /**
     * @return string
     */
    public function getSalt(): string
    {
        return $this->salt;
    }

    /**
     * @param string $salt
     * @return self
     */
    public function setSalt(string $salt): self
    {
        $this->salt = $salt;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getConfirmationToken(): ?string
    {
        return $this->confirmationToken;
    }

    /**
     * @param string|null $confirmationToken
     * @return self
     */
    public function setConfirmationToken(?string $confirmationToken): self
    {
        $this->confirmationToken = $confirmationToken;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getLastLogin(): ?\DateTime
    {
        return $this->lastLogin;
    }

    /**
     * @param \DateTime|null $lastLogin
     * @return self
     */
    public function setLastLogin(?\DateTime $lastLogin): self
    {
        $this->lastLogin = $lastLogin;
        return $this;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        $roles = $this->roles;

        foreach ($this->getUserGroups() as $userGroup) {
            /** @var UserGroupInterface $userGroup */
            $roles = array_merge($roles, $userGroup->getGroup()->getRoles());
        }

        // we need to make sure to have at least one role
        $roles[] = self::ROLE_DEFAULT;

        return array_values(array_unique($roles));
    }

    /**
     * @param array|null $roles
     * @return self
     */
    public function setRoles(?array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }

    /**
     * @param string $role
     * @return $this
     */
    public function addRole(string $role): self
    {
        $role = strtoupper($role);
        if ($role === self::ROLE_DEFAULT) {
            return $this;
        }

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


    public function eraseCredentials(): void
    {
        $this->plainPassword = null;
    }

    /**
     * @return Collection|UserGroupInterface[]
     */
    public function getUserGroups()
    {
        return $this->userGroups;
    }

    /**
     * @param Collection|UserGroupInterface[] $userGroups
     * @return $this
     */
    public function setUserGroups($userGroups)
    {
        $this->userGroups = $userGroups;
        return $this;
    }

    /**
     * @return ContractorInterface|null
     */
    public function getDefaultBillingContractor(): ?ContractorInterface
    {
        return $this->defaultBillingContractor;
    }

    /**
     * @param ContractorInterface|null $defaultBillingContractor
     * @return $this
     */
    public function setDefaultBillingContractor(?ContractorInterface $defaultBillingContractor): static
    {
        $this->defaultBillingContractor = $defaultBillingContractor;
        return $this;
    }

    /**
     * @return ContractorInterface|null
     */
    public function getDefaultDeliveryContractor(): ?ContractorInterface
    {
        return $this->defaultDeliveryContractor;
    }

    /**
     * @param ContractorInterface|null $defaultDeliveryContractor
     * @return $this
     */
    public function setDefaultDeliveryContractor(?ContractorInterface $defaultDeliveryContractor): static
    {
        $this->defaultDeliveryContractor = $defaultDeliveryContractor;
        return $this;
    }

    /**
     * @return ContractorInterface|null
     */
    public function getDefaultRecipientContractor(): ?ContractorInterface
    {
        return $this->defaultRecipientContractor;
    }

    /**
     * @param ContractorInterface|null $defaultRecipientContractor
     * @return $this
     */
    public function setDefaultRecipientContractor(?ContractorInterface $defaultRecipientContractor): static
    {
        $this->defaultRecipientContractor = $defaultRecipientContractor;
        return $this;
    }
}
