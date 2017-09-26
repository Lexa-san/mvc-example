<?php

namespace app\Model;

use app\Core\Db\Db;

class Chess
{
    const DEFAULT_MAX_COLLECTION = 100;

    protected $_id;
    protected $_name;

    /**
     * @return \PDO
     * @throws \app\Core\Db\NoConfigException
     */
    protected function _getConn()
    {
        return Db::getInstance()->getConn();
    }

    public static function filterId($param)
    {
        return (int)$param;
    }

    public static function validateId($param)
    {
        if ($param > 0) {
            return true;
        }
        return false;
    }

    public function load($id)
    {
        $dbh = $this->_getConn();
        $sql = 'SELECT id, name from chess_position where id=:id';
        $sth = $dbh->prepare($sql);
//        $sth->bindValue(':id', 1);
        $sth->execute([':id' => (int)$id]);

        $data = $sth->fetchRow(\PDO::FETCH_ASSOC);

        $this->_id = $data['id'];
        $this->_name = $data['name'];

        var_export($data);
    }

    public function setId($val)
    {
        $this->_id = (int)$val;
        return $this;
    }

    public function getId()
    {
        return (int)$this->_id;
    }

    public function setName($val)
    {
        $this->_name = (string)$val;
        return $this;
    }

    public function getName()
    {
        return (string)$this->_name;
    }

    public function getLink()
    {
        if (!$this->_id) {
            return null;
        }
        return sprintf('index.php?c=index&a=view&id=%s', $this->_id);
    }

}