<?php
/**
 * Created by PhpStorm.
 * User: lexa-san
 * Date: 25.09.17
 * Time: 12:26
 */

namespace app\Core;


final class Registry
{

    protected static $_data;

    /**
     * @param array $cfg
     */
    public static function setConfig($cfg)
    {
        self::$_data['config'] = $cfg;
    }

    public static function getConfig()
    {
        if (isset(self::$_data['config'])) {
            return self::$_data['config'];
        }
        return null;
    }

}