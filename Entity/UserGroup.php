<?php
declare(strict_types=1);

namespace LSB\UserBundle\Entity;

use Doctrine\ORM\Mapping\MappedSuperclass;
use LSB\UtilityBundle\Traits\CreatedUpdatedTrait;
use LSB\UtilityBundle\Traits\UuidTrait;


/**
 * Class UserGroup
 * @package LSB\UserBundle\Entity
 *
 * @MappedSuperclass
 */
class UserGroup implements UserGroupInterface
{
    use UuidTrait;
    use CreatedUpdatedTrait;

    public function __construct()
    {
        $this->generateUuid();
    }

    /**
     * @throws \Exception
     */
    public function __clone()
    {
        if ($this->getId()) {
            $this->id = null;
        }
        $this->generateUuid($force = true);
    }
}
