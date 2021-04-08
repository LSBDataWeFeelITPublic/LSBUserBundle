<?php
declare(strict_types=1);

namespace LSB\UserBundle\Security;

use LSB\UserBundle\Entity\User;
use LSB\UserBundle\Entity\UserInterface;
use LSB\UserBundle\Manager\UserManager;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\User\UserInterface as SecurityUserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * Class UserProvider
 * @package LSB\UserBundle\Security
 */
class UserProvider implements UserProviderInterface, PasswordUpgraderInterface
{

    protected UserManager $userManager;

    /**
     * UserProvider constructor.
     * @param UserManager $userManager
     */
    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * @param string $username
     * @return UserInterface
     */
    public function loadUserByUsername(string $username): UserInterface
    {
        $user = $this->findUser($username);

        if (!$user) {
            throw new UsernameNotFoundException(sprintf('Username "%s" does not exist.', $username));
        }

        return $user;
    }

    /**
     * @param SecurityUserInterface $user
     * @return SecurityUserInterface
     */
    public function refreshUser(SecurityUserInterface $user): SecurityUserInterface
    {
        if (!$user instanceof UserInterface || !$this->supportsClass(get_class($user))) {
            throw new UnsupportedUserException(sprintf('Expected an instance of %s, but got "%s".', $this->userManager->getClass(), get_class($user)));
        }

        if (null === $reloadedUser = $this->userManager->findUserBy(['id' => $user->getId()])) {
            throw new UsernameNotFoundException(sprintf('User with ID "%s" could not be reloaded.', $user->getId()));
        }

        return $reloadedUser;
    }

    /**
     * @param string $class
     * @return bool
     */
    public function supportsClass(string $class): bool
    {
        $userClass = User::class;

        return $userClass === $class || is_subclass_of($class, $userClass);
    }


    /**
     * @param string $username
     * @return UserInterface|null
     */
    protected function findUser(string $username): ?UserInterface
    {
        return $this->userManager->findUserByUsername($username);
    }

    /**
     * @param UserInterface $user
     * @param string $newHashedPassword
     */
    public function upgradePassword(UserInterface $user, string $newHashedPassword): void
    {
        $user->setPassword($newHashedPassword);
        $this->userManager->flush();
    }
}
