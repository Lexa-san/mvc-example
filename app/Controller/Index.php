<?php

namespace app\Controller;

use app\View;
use app\Core\Request;

class Index
{
    /* @var View\ViewInterface */
    public $view;

    function __construct()
    {
        $this->view = null;
    }

    function indexAction()
    {
        $this->view = new View\Index\Index();
        $this->view->generate();
    }

    function viewAction()
    {
        try {

            // validate
            $id = (int)Request::getGetParam('id');
            if (!$id) {
                throw new \InvalidArgumentException();
            }

        } catch (\InvalidArgumentException $e) {
            var_export('InvalidArgumentException');
        }

        $this->view = new View\Index\View();
        $this->view->generate();
    }
}
