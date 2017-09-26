<?php

namespace app\View\Index;

use app\View\ViewAbstract;
use app\Model\Chess;
use app\Model\ChessCollection;
use app\Model\Exception;

class View extends ViewAbstract
{
    public $_pageTemplate = 'page.php';
    public $_viewTemplate = 'index/view.php';

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

//        $pos = $this->getViewData('chessPosition');
        $error = $this->getViewData('error');

        if ($error instanceof Exception\ChessNoModel) {
            $this->addViewData('hasError', true);
            $this->addViewData('errorMessage', $error->getMessage());

            $this->_viewTemplate = 'index/view_empty.php';
        }

        echo $this->parsePageTemplate();
    }

}