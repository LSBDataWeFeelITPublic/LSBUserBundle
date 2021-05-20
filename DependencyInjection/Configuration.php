<?php
declare(strict_types=1);

namespace LSB\UserBundle\DependencyInjection;

use LSB\UserBundle\Entity\User;
use LSB\UserBundle\Entity\Group;
use LSB\UserBundle\Entity\GroupInterface;
use LSB\UserBundle\Entity\UserGroup;
use LSB\UserBundle\Entity\UserGroupInterface;
use LSB\UserBundle\Entity\UserInterface;
use LSB\UserBundle\Factory\UserFactory;
use LSB\UserBundle\Factory\GroupFactory;
use LSB\UserBundle\Factory\UserGroupFactory;
use LSB\UserBundle\Form\UserGroupType;
use LSB\UserBundle\Form\GroupType;
use LSB\UserBundle\Form\UserType;
use LSB\UserBundle\LSBUserBundle;
use LSB\UserBundle\Manager\GroupManager;
use LSB\UserBundle\Manager\UserGroupManager;
use LSB\UserBundle\Manager\UserManager;
use LSB\UserBundle\Repository\UserGroupRepository;
use LSB\UserBundle\Repository\GroupRepository;
use LSB\UserBundle\Repository\UserRepository;
use LSB\UtilityBundle\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    const CONFIG_KEY = 'lsb_user';

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder(self::CONFIG_KEY);

        $treeBuilder
            ->getRootNode()
            ->children()
            ->bundleTranslationDomainScalar(LSBUserBundle::class)->end()
            ->resourcesNode()
            ->children()

            //User
            ->resourceNode(
                'user',
                User::class,
                UserInterface::class,
                UserFactory::class,
                UserRepository::class,
                UserManager::class,
                UserType::class
            )
            ->end()

            //Group
            ->resourceNode(
                'group',
                Group::class,
                GroupInterface::class,
                GroupFactory::class,
                GroupRepository::class,
                GroupManager::class,
                GroupType::class
            )
            ->end()

            //UserGroup
            ->resourceNode(
                'user_group',
                UserGroup::class,
                UserGroupInterface::class,
                UserGroupFactory::class,
                UserGroupRepository::class,
                UserGroupManager::class,
                UserGroupType::class
            )
            ->end()

            ->end()
            ->end()
            ->end();

        return $treeBuilder;
    }
}
