<?php
declare(strict_types=1);

namespace LSB\UserBundle\DependencyInjection;

use LSB\UserBundle\Entity\UserGroupInterface;
use LSB\UserBundle\Entity\UserGroupRelationInterface;
use LSB\UserBundle\Entity\UserInterface;
use LSB\UserBundle\Factory\UserFactory;
use LSB\UserBundle\Factory\UserGroupFactory;
use LSB\UserBundle\Factory\UserGroupRelationFactory;
use LSB\UserBundle\Form\UserGroupRelationType;
use LSB\UserBundle\Form\UserGroupType;
use LSB\UserBundle\Form\UserType;
use LSB\UserBundle\LSBUserBundle;
use LSB\UserBundle\Manager\UserGroupManager;
use LSB\UserBundle\Manager\UserGroupRelationManager;
use LSB\UserBundle\Manager\UserManager;
use LSB\UserBundle\Repository\UserGroupRelationRepository;
use LSB\UserBundle\Repository\UserGroupRepository;
use LSB\UserBundle\Repository\UserRepository;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use LSB\UtilityBundle\DependencyInjection\BaseExtension as BE;

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
            ->scalarNode(BE::CONFIG_KEY_TRANSLATION_DOMAIN)->defaultValue((new \ReflectionClass(LSBUserBundle::class))->getShortName())->end()
            ->arrayNode(BE::CONFIG_KEY_RESOURCES)
            ->children()

            // Start User
            ->arrayNode('user')
            ->addDefaultsIfNotSet()
            ->children()
            ->arrayNode(BE::CONFIG_KEY_CLASSES)
            ->children()
            ->scalarNode(BE::CONFIG_KEY_ENTITY)->end()
            ->scalarNode(BE::CONFIG_KEY_INTERFACE)->defaultValue(UserInterface::class)->end()
            ->scalarNode(BE::CONFIG_KEY_FACTORY)->defaultValue(UserFactory::class)->end()
            ->scalarNode(BE::CONFIG_KEY_REPOSITORY)->defaultValue(UserRepository::class)->end()
            ->scalarNode(BE::CONFIG_KEY_MANAGER)->defaultValue(UserManager::class)->end()
            ->scalarNode(BE::CONFIG_KEY_FORM)->defaultValue(UserType::class)->end()
            ->end()
            ->end()
            ->end()
            ->end()
            // End User

            // Start UserGroup
            ->arrayNode('user_group')
            ->addDefaultsIfNotSet()
            ->children()
            ->arrayNode(BE::CONFIG_KEY_CLASSES)
            ->children()
            ->scalarNode(BE::CONFIG_KEY_ENTITY)->end()
            ->scalarNode(BE::CONFIG_KEY_INTERFACE)->defaultValue(UserGroupInterface::class)->end()
            ->scalarNode(BE::CONFIG_KEY_FACTORY)->defaultValue(UserGroupFactory::class)->end()
            ->scalarNode(BE::CONFIG_KEY_REPOSITORY)->defaultValue(UserGroupRepository::class)->end()
            ->scalarNode(BE::CONFIG_KEY_MANAGER)->defaultValue(UserGroupManager::class)->end()
            ->scalarNode(BE::CONFIG_KEY_FORM)->defaultValue(UserGroupType::class)->end()
            ->end()
            ->end()
            ->end()
            ->end()
            // End UserGroup

            // Start UserGroupRelation
            ->arrayNode('user_group_relation')
            ->addDefaultsIfNotSet()
            ->children()
            ->arrayNode(BE::CONFIG_KEY_CLASSES)
            ->children()
            ->scalarNode(BE::CONFIG_KEY_ENTITY)->end()
            ->scalarNode(BE::CONFIG_KEY_INTERFACE)->defaultValue(UserGroupRelationInterface::class)->end()
            ->scalarNode(BE::CONFIG_KEY_FACTORY)->defaultValue(UserGroupRelationFactory::class)->end()
            ->scalarNode(BE::CONFIG_KEY_REPOSITORY)->defaultValue(UserGroupRelationRepository::class)->end()
            ->scalarNode(BE::CONFIG_KEY_MANAGER)->defaultValue(UserGroupRelationManager::class)->end()
            ->scalarNode(BE::CONFIG_KEY_FORM)->defaultValue(UserGroupRelationType::class)->end()
            ->end()
            ->end()
            ->end()
            ->end()
            // End UserGroupRelation

            ->end()
            ->end()
            ->end();

        return $treeBuilder;
    }
}
