<?php
declare(strict_types=1);

namespace LSB\UserBundle\Entity;


interface UserInterface extends \Symfony\Component\Security\Core\User\UserInterface
{
    const ROLE_DEFAULT = 'ROLE_USER';
}
