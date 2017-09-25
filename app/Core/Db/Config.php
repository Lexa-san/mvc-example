<?php

namespace app\Core\Db;


class Config
{
    protected $_driver;
    protected $_host;
    protected $_port;
    protected $_schema;
    protected $_user;
    protected $_password;

    /**
     * @return string
     */
    public function getDriver()
    {
        return $this->_driver;
    }

    /**
     * @param string $driver
     * @return $this
     */
    public function setDriver($driver)
    {
        $this->_driver = $driver;
        return $this;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->_host;
    }

    /**
     * @param string $host
     * @return $this
     */
    public function setHost($host)
    {
        $this->_host = $host;
        return $this;
    }

    /**
     * @return string
     */
    public function getPort()
    {
        return $this->_port;
    }

    /**
     * @param string $port
     * @return $this
     */
    public function setPort($port)
    {
        $this->_port = $port;
        return $this;
    }

    /**
     * @return string
     */
    public function getSchema()
    {
        return $this->_schema;
    }

    /**
     * @param string $schema
     * @return $this
     */
    public function setSchema($schema)
    {
        $this->_schema = $schema;
        return $this;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->_user;
    }

    /**
     * @param string $user
     * @return $this
     */
    public function setUser($user)
    {
        $this->_user = $user;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * @param string $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->_password = $password;
        return $this;
    }


}