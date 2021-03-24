<?php
declare(strict_types=1);

namespace LSB\UserBundle\DependencyInjection\Compiler;

use LSB\UserBundle\DependencyInjection\Configuration;
use LSB\UtilityBundle\DependencyInjection\Compiler\BaseResolveEntitiesPass;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class AddResolveEntitiesPass
 * @package LSB\UserBundle\DependencyInjection\Compiler
 */
class AddResolveEntitiesPass extends BaseResolveEntitiesPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     * @throws \Exception
     */
    public function process(ContainerBuilder $container)
    {
        $this->processResources($container, Configuration::CONFIG_KEY);
    }
}
