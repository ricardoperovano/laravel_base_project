<?php

namespace App\Utils;

class Helper
{
    /**
     * @param $class
     * @return string
     */
    public static function camelCaseToDash($class)
    {
        return strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1-', $class));
    }

    /**
     * @param $class
     * @return string
     */
    public static function camelCaseToUnderscore($class)
    {
        return strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1_', $class));
    }
}
