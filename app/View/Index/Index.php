<?php

namespace app\View\Index;

use app\View\ViewAbstract;
use app\Model\ChessCollection;

class Index extends ViewAbstract
{
    protected $_pageTemplate = 'page.php';
    protected $_viewTemplate = 'index/index.php';

    /**
     * @param array  $data
     * @param string $viewTemplate
     * @param string $pageTemplate
     *
     * @throws \app\Core\Db\NoConfigException
     */
    function generate($data = [], $viewTemplate = '', $pageTemplate = '')
    {
        parent::generate();

        /* @var ChessCollection $chessCollection */
        $chessCollection = (new ChessCollection())->load();
        $this->addViewData('chessPositions', $chessCollection);

        echo $this->parsePageTemplate();
    }

}