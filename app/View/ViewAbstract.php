<?php

namespace app\View;


abstract class ViewAbstract
{
    public $pageTemplate;
    public $viewTemplate;
    public $viewData = [];

    public function parseViewTemplate($data = [])
    {
        if (is_array($data)) {
            extract($data);
        }
        //extract(array_merge($this->viewData, $data));

        ob_start();
        include 'app/tpl/'.$this->viewTemplate;
        return ob_get_clean();
    }

    public function parsePageTemplate($data = [])
    {
        if (is_array($data)) {
            extract($data);
        }

        ob_start();
        include 'app/tpl/'.$this->pageTemplate;
        return ob_get_clean();
    }

    public function getViewData($key = '')
    {
        if (!$key) {
            return (array)$this->viewData;
        } elseif (isset($this->viewData[$key])) {
            return $this->viewData[$key];
        }

    }

    public function setViewData(array $data)
    {
        $this->viewData = $data;
    }

    public function addViewData($key, $val)
    {
        $this->viewData[$key] = $val;
    }

    public abstract function generate($data, $viewTemplate, $pageTemplate);

}