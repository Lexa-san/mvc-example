<?php

namespace app\Core\Db;

use app\Core\Db\Config;

class Db
{

    /* @var Db */
    protected static $_instance;

    /* @var \PDO */
    protected $_dbh;

    /**
     * Db constructor.
     *
     * @param Config $cfg
     *
     * @throws \PDOException
     */
    protected function __construct(Config $cfg)
    {
        $dsn        = sprintf('%s:dbname=%s;host=%s', $cfg->getDriver(), $cfg->getSchema(), $cfg->getHost());
        $this->_dbh = new \PDO($dsn, $cfg->getUser(), $cfg->getPassword());
    }

    /**
     * @param Config|null $cfg
     *
     * @return Db
     * @throws NoConfigException
     */
    public static function getInstance(Config $cfg = null)
    {
        if (!static::$_instance) {
            if (!$cfg) {
                throw new NoConfigException();
            }
            static::$_instance = new Db($cfg);
        }

        return static::$_instance;
    }

    /**
     * @return \PDO
     */
    public function getConn()
    {
        return $this->_dbh;
    }
}