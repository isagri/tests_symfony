<?php

namespace App\Enum;

use Doctrine\DBAL\Platforms\AbstractPlatform;

/**
 * Class Status
 * @package App\Enum
 */
class StatusType extends EnumType
{
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        // TODO: Implement getSQLDeclaration() method.
    }

    protected static $name = 'enumstatus';

    const NONE       = 'none';
    const ACTIVE     = 'active';
    const INACTIVE   = 'inactive';
    const NUM   = '123';
    protected static $values = [
        self::NONE,
        self::ACTIVE,
        self::INACTIVE,
        self::NUM,
    ];
}
