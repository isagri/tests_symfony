<?php

namespace App\Enum;

use Doctrine\DBAL\Types\Type;

/**
 * Class EnumType
 * @package Eliberty\RedpillBundle\Enum
 */
abstract class EnumType extends Type
{
    protected static $name = '';
    protected static $allowEmpty = false;
    protected static $values;

    /**
     * @return string
     */
    public function getName()
    {
        return static::$name;
    }

    /**
     * @return array
     */
    public static function getValues()
    {
        return static::$values;
    }

    /**
     * @param $val
     *
     * @return bool
     */
    public static function isValid($val)
    {
        return ((null === $val && static::$allowEmpty) || in_array($val, static::$values));
    }
}
