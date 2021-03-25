<?php
declare(strict_types=1);

namespace LSB\UserBUndle\Entity;


interface UserInterface extends \Symfony\Component\Security\Core\User\UserInterface
{
    const ROLE_DEFAULT = 'ROLE_USER';
}
