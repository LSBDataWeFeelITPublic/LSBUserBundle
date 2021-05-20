<?php
declare(strict_types=1);

namespace LSB\UserBundle\Entity;


interface UserGroupInterface
{

    public function getUser(): UserInterface;

    public function setUser(UserInterface $user): self;

    public function getGroup(): GroupInterface;

    public function setGroup(GroupInterface $group): self;

}
