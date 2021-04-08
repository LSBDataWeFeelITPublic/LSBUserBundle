<?php
declare(strict_types=1);

namespace LSB\UserBundle\Entity;


use Symfony\Component\Security\Core\User\LegacyPasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

interface UserInterface extends \Symfony\Component\Security\Core\User\UserInterface
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
