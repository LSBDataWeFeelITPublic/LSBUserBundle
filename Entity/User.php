<?php
declare(strict_types=1);

namespace LSB\UserBUndle\Entity;

use Doctrine\ORM\Mapping as ORM;
use LSB\UtilityBundle\Traits\CreatedUpdatedTrait;
use Doctrine\ORM\Mapping\MappedSuperclass;
use LSB\UtilityBundle\Traits\UuidTrait;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class User
 * @package LSB\UserBUndle\Entity
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
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\Length(max=255)
     */
    protected string $salt;


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
     * Contractor constructor.
     */
    public function __construct()
    {
        $this->generateUuid();

    }

    public function __clone()
    {
        if ($this->getId()) {
            $this->id = null;
        }

        $this->generateUuid($force = true);
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
     * @return User
     */
    public function setIsEnabled(bool $isEnabled): User
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
     * @return User
     */
    public function setUsername(string $username): User
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
     * @return User
     */
    public function setEmail(string $email): User
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
     * @return User
     */
    public function setFirstName(?string $firstName): User
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
     * @return User
     */
    public function setLastName(?string $lastName): User
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
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
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
     * @return User
     */
    public function setSalt(string $salt): User
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
     * @return User
     */
    public function setConfirmationToken(?string $confirmationToken): User
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
     * @return User
     */
    public function setLastLogin(?\DateTime $lastLogin): User
    {
        $this->lastLogin = $lastLogin;
        return $this;
    }

}
