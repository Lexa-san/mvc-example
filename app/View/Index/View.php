<?php

namespace app\View;

use app\View\ViewInterface;

class View implements ViewInterface
{
    public $pageTemplate = 'page.php';
    public $viewTemplate = 'index/view.php';

    function generate($data = null, $viewTemplate = '', $pageTemplate = '')
    {
        $viewTemplate = ($viewTemplate) ? $viewTemplate : $this->viewTemplate;
        $pageTemplate = ($pageTemplate) ? $pageTemplate : $this->pageTemplate;

        if (is_array($data)) {
            extract($data);
        }

        include 'app/tpl/'.$pageTemplate;
    }

}