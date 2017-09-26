<?php

namespace app\Core;

use app\Controller\Index;
use app\Core\Request;
use app\Core\Exception;

class Router
{
    const DEFAULT_CONTROLLER = 'Index';
    const DEFAULT_ACTION     = 'index';

    public static function run()
    {
        try {
            $controllerName = self::getController();

            $controllerClass = sprintf('app\Controller\%s', $controllerName);
            $controllerPath  = sprintf('app/Controller/%s.php', $controllerName);
            if (!file_exists($controllerPath)) {
                throw new Exception\Router404();
            }

            $controller = new $controllerClass;

            $actionName   = self::getAction();
            $actionMethod = $actionName . 'Action';

            if (!method_exists($controller, $actionMethod)) {
                throw new Exception\Router404();
            }

            $controller->$actionMethod();

        } catch (Exception\Router404 $e) {
            Router::ErrorPage404();
        }

    }

    public static function getController()
    {
        $res = Request::getParam('c');
        $res = preg_replace('/[^a-z0-9\_]/i', '', $res);

        if (!$res) {
            return self::DEFAULT_CONTROLLER;
        }

        return ucfirst($res);
    }

    public static function getAction()
    {
        $res = Request::getParam('a');
        $res = preg_replace('/[^a-z0-9\_]/i', '', $res);

        if (!$res) {
            return self::DEFAULT_ACTION;
        }

        return $res;
    }

    public static function ErrorPage404()
    {
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
//        header('Location: ?c=error404');
        header(sprintf('Location: http://%s%s/index.php?c=index&a=error404', $_SERVER['HTTP_HOST'], rtrim(dirname($_SERVER['PHP_SELF']), '/\\')));

        $controller = (new Index())->error404Action();
        exit;
    }

}