<?php

namespace app\Controller;

use app\Model\Exception;
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
        $this->_view = new View\Index\View();

        try {
            // validate
            $id = Chess::filterId(Request::getGetParam('id'));

            if (!Chess::validateId($id)) {
                throw new Exception\ChessNoModel();
            }

            $position = (new Chess())->load($id);
            if (!$position) {
                throw new Exception\ChessNoModel();
            }

            $this->_view->addViewData('chessPosition', $position);

        } catch (ChessNoModel $e) {
            $this->_view->addViewData('error', $e);
        } catch (\Exception $e) {
            $this->_view->addViewData('error', $e);
        }

        $this->_view->generate();
    }
}
