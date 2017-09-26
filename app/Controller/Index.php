<?php

namespace app\Controller;

use app\View;
use app\Core\Request;
use app\Model\Chess;
//use app\Model\ChessCollection;

class Index
{
    /* @var View\ViewInterface */
    protected $_view;

    function __construct()
    {
        $this->_view = null;
    }

    function indexAction()
    {
        $this->_view = new View\Index\Index();
        $this->_view->generate();
    }

    function viewAction()
    {
//        $this->_view = new View\Index\View();
//
//
//        $positions = (array)$this->_model->loadPositionCollection();
//        $this->_view->generate([
//            'positions' => $positions
//        ]);
//
//        try {
//            // validate
//            $id = $this->_model->filterId(Request::getGetParam('id'));
//
//            if (!$this->_model->validateId($id)) {
//                throw new \InvalidArgumentException();
//            }
//
//        } catch (\InvalidArgumentException $e) {
//            $this->_view->setViewData([
//                'error' => 'InvalidArgumentException'
//            ]);
//        }
//
//        $this->_view->generate();
    }
}
