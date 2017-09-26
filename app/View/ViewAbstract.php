<?php

namespace app\View;


abstract class ViewAbstract
{
    protected $_pageTemplate;
    protected $_viewTemplate;
    protected $_viewData = [];

    /**
     * @param array $data
     *
     * @return string
     */
    public function parseViewTemplate($data = [])
    {
        if (is_array($data)) {
            extract($data);
        }
        //extract(array_merge($this->viewData, $data));

        ob_start();
        include 'app/tpl/' . $this->_viewTemplate;

        return ob_get_clean();
    }

    /**
     * @param array $data
     *
     * @return string
     */
    public function parsePageTemplate($data = [])
    {
        if (is_array($data)) {
            extract($data);
        }

        ob_start();
        include 'app/tpl/' . $this->_pageTemplate;

        return ob_get_clean();
    }

    /**
     * @param string $key
     *
     * @return array|mixed
     */
    public function getViewData($key = '')
    {
        if (!$key) {
            return (array)$this->_viewData;
        } elseif (isset($this->_viewData[ $key ])) {
            return $this->_viewData[ $key ];
        }

    }

    /**
     * @param array $data
     */
    public function setViewData(array $data)
    {
        $this->_viewData = $data;
    }

    /**
     * @param $key
     * @param $val
     */
    public function addViewData($key, $val)
    {
        $this->_viewData[ $key ] = $val;
    }

    /**
     * @param array  $data
     * @param string $viewTemplate
     * @param string $pageTemplate
     */
    public function generate($data = [], $viewTemplate = '', $pageTemplate = '')
    {
        if ($viewTemplate) {
            $this->_viewTemplate = $viewTemplate;
        }
        if ($pageTemplate) {
            $this->_pageTemplate = $pageTemplate;
        }

        if (count((array)$data)) {
            $this->setViewData($data);
        }
    }

    public function setViewTemplate($tpl)
    {
        $this->_viewTemplate = $tpl;
        return $this;
    }

    public function setPageTemplate($tpl)
    {
        $this->_pageTemplate = $tpl;
        return $this;
    }

}