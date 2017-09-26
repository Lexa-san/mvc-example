<?php

namespace app\Core;


class Request
{

    const REQUEST_TYPE_GET  = 'GET';
    const REQUEST_TYPE_POST = 'POST';
    const REQUEST_TYPE_ANY  = 'ANY';

    public static function getParam($param, $type = self::REQUEST_TYPE_ANY)
    {
        switch ($type) {
            case self::REQUEST_TYPE_GET:
                $res = isset($_GET[ $param ]) ? $_GET[ $param ] : null;
                break;
            case self::REQUEST_TYPE_POST:
                $res = isset($_POST[ $param ]) ? $_POST[ $param ] : null;
                break;
            case self::REQUEST_TYPE_ANY:
                $res = isset($_POST[ $param ]) ? $_POST[ $param ] : null;
                if (!$res) {
                    $res = isset($_GET[ $param ]) ? $_GET[ $param ] : null;
                }
                break;
        }

        return $res;
    }

    public static function getGetParam($param)
    {
        return self::getParam($param, self::REQUEST_TYPE_GET);
    }

    public static function getPostParam($param)
    {
        return self::getParam($param, self::REQUEST_TYPE_POST);
    }
}