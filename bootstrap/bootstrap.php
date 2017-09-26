<?php
ini_set('display_error', 1);
error_reporting(E_ALL & ~E_NOTICE);

chdir(__DIR__ . '/../');

// autoload
spl_autoload_register(function ($class) {
    $base_dir = './';
    $file     = $base_dir . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

use app\Core\Registry;
use app\Core\Router;
use app\Core\Db;

// get config
$cfg = array_merge([],
    require_once __DIR__ . '/config.php'
);

// set Registry
Registry::setConfig($cfg);

// init DB connection
try {
    $cfgDb = Registry::getConfig()['db'];
    $dbCfg = new Db\Config();
    $dbCfg->setDriver($cfgDb['driver'])->setHost($cfgDb['host'])->setSchema($cfgDb['schema'])->setUser($cfgDb['username'])->setPassword($cfgDb['password']);
    $dbh = Db\Db::getInstance($dbCfg);
//    var_export($dbh);
} catch (PDOException $e) {
    die('No DB Connection.');
} catch (Db\NoConfigException $e) {
    die('No Config to connect to the DB.');
}


Router::run();