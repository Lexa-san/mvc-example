<?php

namespace app\Model;

use app\Core\Db\Db;
use app\Model\Exception;

class Chess
{
    const DEFAULT_MAX_COLLECTION = 100;

    protected $_id;
    protected $_name;
    protected $_grid = [];

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

    /**
     * @param $id
     *
     * @return $this
     * @throws Exception\ChessNoModel
     * @throws \app\Core\Db\NoConfigException
     */
    public function load($id)
    {
        $dbh = $this->_getConn();
        $sql = 'SELECT id, name from chess_position where id=:id';
        $sth = $dbh->prepare($sql);
        $sth->bindValue(':id', $id, \PDO::PARAM_INT);
//        $sth->execute([':id' => $id]);
        $sth->execute();

        $data = $sth->fetch(\PDO::FETCH_ASSOC);
//        var_export($data);
        if (!$data) {
            throw new Exception\ChessNoModel();
        }

        $this->_id   = $data['id'];
        $this->_name = $data['name'];

        $this->_loadGridAndFigures();

        return $this;
    }

    protected function _loadGridAndFigures($id = 0)
    {
        $id = ($id) ? $id : $this->_id;

        $dbh = $this->_getConn();
        $sql = '
            SELECT cf.name AS figure, cpp.color AS color, cg.horizontal AS x, cg.vertical AS y
            FROM chess_position_plan cpp
              INNER JOIN chess_position cp on cp.id = cpp.position_id
              INNER JOIN chess_figure cf on cf.id = cpp.figure_id
              INNER JOIN chess_grid cg on cg.id = cpp.grid_id
            WHERE
              cp.id = :id
        ';

        $sth = $dbh->prepare($sql);
        $sth->bindValue(':id', $id, \PDO::PARAM_INT);
        $sth->execute();

        while ($row = $sth->fetch()) {
            $this->_grid[$row['x']][$row['y']] = [
                'figure' => $row['figure'],
                'color' => $row['color'],
            ];
        }

    }

    /**
     * @param $x
     * @param $y
     *
     * @return string|null
     */
    public function getFigureOnGrid($x, $y)
    {
        if (isset($this->_grid[$x][$y])) {
            $figure = $this->_grid[$x][$y];
            return sprintf('%s%s', $figure['figure'], $figure['color']);
        }

        return null;
    }

    public function getGrid()
    {
        return $this->_grid;
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

        return sprintf('?c=index&a=view&id=%s', $this->_id);
    }

}