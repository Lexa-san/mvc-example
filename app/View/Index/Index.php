<?php

namespace app\View\Index;

use app\View\ViewAbstract;

class Index extends ViewAbstract
{
    public $pageTemplate = 'page.php';
    public $viewTemplate = 'index/index.php';

    function generate($data = null, $viewTemplate = '', $pageTemplate = '')
    {
        $viewTemplate = ($viewTemplate) ? $viewTemplate : $this->viewTemplate;
        $pageTemplate = ($pageTemplate) ? $pageTemplate : $this->pageTemplate;

        $this->viewData = $data;

        $this->parsePageTemplate(['test'=>__METHOD__]);
    }

}