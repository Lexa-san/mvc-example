<?php

namespace app\Model;

use app\Core\Db\Db;
use app\Model\Chess;

class ChessCollection
{
    const DEFAULT_MAX_COLLECTION = 100;

    protected $_items = [];

    /**
     * @return \PDO
     * @throws \app\Core\Db\NoConfigException
     */
    protected function _getConn()
    {
        return Db::getInstance()->getConn();
    }

    /**
     * @return array
     * @throws \app\Core\Db\NoConfigException
     */
    public function load()
    {
        $dbh = $this->_getConn();
        $sql = 'SELECT id, name from chess_position limit ' . self::DEFAULT_MAX_COLLECTION;
        $sth = $dbh->prepare($sql);
        $sth->execute();

        while ($row = $sth->fetch(\PDO::FETCH_ASSOC)) {
            $item = new Chess();
            $item->setId($row['id'])->setName($row['name']);
            $this->_items[] = $item;
        }

        return $this;
    }

    public function getItems()
    {
        return (array)$this->_items;
    }
}