<?php
declare(strict_types=1);

namespace LSB\UserBundle\Factory;

use LSB\UserBundle\Entity\UserInterface;
use LSB\UtilityBundle\Factory\BaseFactory;

/**
 * Class UserFactory
 * @package LSB\UserBundle\Factory
 */
class UserFactory extends BaseFactory implements UserFactoryInterface
{

    /**
     * @return UserInterface
     */
    public function createNew(): UserInterface
    {
        return parent::createNew();
    }

}
