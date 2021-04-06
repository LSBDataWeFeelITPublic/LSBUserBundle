<?php
declare(strict_types=1);

namespace LSB\UserBundle\Entity;


interface UserGroupRelationInterface
{

    public function getUser(): UserInterface;

    public function setUser(UserInterface $user): self;

    public function getUserGroup(): UserGroupInterface;

    public function setUserGroup(UserGroupInterface $userGroup): self;

}
