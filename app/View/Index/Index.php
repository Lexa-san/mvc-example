<?php

namespace app\View\Index;

use app\View\ViewAbstract;
use app\Model\ChessCollection;

class Index extends ViewAbstract
{
    public $pageTemplate = 'page.php';
    public $viewTemplate = 'index/index.php';

    function generate($data = [], $viewTemplate = '', $pageTemplate = '')
    {
        $viewTemplate = ($viewTemplate) ? $viewTemplate : $this->viewTemplate;
        $pageTemplate = ($pageTemplate) ? $pageTemplate : $this->pageTemplate;

        if (count((array)$data)) {
            $this->setViewData($data);
        }

        /* @var ChessCollection $chessCollection */
        $chessCollection = (new ChessCollection())->load();
        $this->addViewData('chessPositions', $chessCollection);

        echo $this->parsePageTemplate();
    }

}