<?php
declare(strict_types=1);

namespace LSB\UserBundle\Security;


use Symfony\Component\Security\Core\Exception\CustomUserMessageAccountStatusException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class UserChecker
 * @package LSB\UserBundle\Security
 */
class UserChecker implements UserCheckerInterface
{
    public function checkPreAuth(UserInterface $user)
    {
        if (!$user instanceof \LSB\UserBundle\Entity\UserInterface) {
            return;
        }

        if (!$user->isEnabled()) {
            throw new CustomUserMessageAccountStatusException('Account is disabled');
        }
    }

    public function checkPostAuth(UserInterface $user)
    {

    }
}
