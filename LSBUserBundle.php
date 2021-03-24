<?php

namespace LSB\UserBundle;

use LSB\UserBundle\DependencyInjection\Compiler\AddManagerResourcePass;
use LSB\UserBundle\DependencyInjection\Compiler\AddResolveEntitiesPass;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class LSBUserBundle
 * @package LSB\UserBundle
 */
class LSBUserBundle extends Bundle
{

    /**
     * @param ContainerBuilder $builder
     */
    public function build(ContainerBuilder $builder)
    {
        parent::build($builder);

        $builder
            ->addCompilerPass(new AddManagerResourcePass())
            ->addCompilerPass(new AddResolveEntitiesPass(), PassConfig::TYPE_BEFORE_OPTIMIZATION, 1);
        ;
    }


}
