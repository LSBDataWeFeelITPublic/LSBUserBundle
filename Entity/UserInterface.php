<?php
declare(strict_types=1);

namespace LSB\UserBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface as BaseUserInterface;

/**
 * Interface UserInterface
 * @package LSB\UserBundle\Entity
 */
interface UserInterface extends BaseUserInterface
{
    const ROLE_DEFAULT = 'ROLE_USER';

    public function isEnabled(): bool;

    public function getFirstName(): ?string;

    public function setFirstName(?string $firstName): self;

    public function getLastName(): ?string;

    public function setLastName(?string $lastName): self;

    public function getConfirmationToken(): ?string;

    public function setConfirmationToken(?string $confirmationToken): self;

    public function getLastLogin(): ?\DateTime;

    public function setLastLogin(?\DateTime $lastLogin): self;
}
