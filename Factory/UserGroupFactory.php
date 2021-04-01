<?php
declare(strict_types=1);

namespace LSB\UserBundle\Factory;

use LSB\UserBundle\Entity\UserGroupInterface;
use LSB\UtilityBundle\Factory\BaseFactory;

/**
 * Class UserGroupFactory
 * @package LSB\UserBundle\Factory
 */
class UserGroupFactory extends BaseFactory implements UserGroupFactoryInterface
{

    /**
     * @return UserGroupInterface
     */
    public function createNew(): UserGroupInterface
    {
        return parent::createNew();
    }

}
