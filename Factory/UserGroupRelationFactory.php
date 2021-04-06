<?php
declare(strict_types=1);

namespace LSB\UserBundle\Factory;

use LSB\UserBundle\Entity\UserGroupRelationInterface;
use LSB\UtilityBundle\Factory\BaseFactory;

/**
 * Class UserGroupRelationFactory
 * @package LSB\UserBundle\Factory
 */
class UserGroupRelationFactory extends BaseFactory implements UserGroupRelationFactoryInterface
{

    /**
     * @return UserGroupRelationInterface
     */
    public function createNew(): UserGroupRelationInterface
    {
        return parent::createNew();
    }

}
