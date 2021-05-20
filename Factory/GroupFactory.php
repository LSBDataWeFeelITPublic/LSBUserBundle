<?php
declare(strict_types=1);

namespace LSB\UserBundle\Factory;

use LSB\UserBundle\Entity\GroupInterface;
use LSB\UtilityBundle\Factory\BaseFactory;

/**
 * Class GroupFactory
 * @package LSB\UserBundle\Factory
 */
class GroupFactory extends BaseFactory implements GroupFactoryInterface
{

    /**
     * @return GroupInterface
     */
    public function createNew(): GroupInterface
    {
        return parent::createNew();
    }

}
