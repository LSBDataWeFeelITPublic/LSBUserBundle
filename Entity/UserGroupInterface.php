<?php
declare(strict_types=1);

namespace LSB\UserBundle\Entity;


interface UserGroupInterface
{
    public function getName(): string;

    public function setName(string $name): self;

    public function getRoles(): ?array;

    public function setRoles(?array $roles): self;

    public function addRole(string $role): self;

    public function hasRole(string $role): bool;

}
