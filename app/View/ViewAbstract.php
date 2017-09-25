<?php

namespace app\View;


abstract class ViewAbstract
{
    public $pageTemplate;
    public $viewTemplate;
    public $viewData = [];

    public function parseViewTemplate($data = [])
    {
        extract(array_merge($this->viewData, $data));

        return $this->viewTemplate;
    }

    public function parsePageTemplate($data = [])
    {
        if (is_array($data)) {
            extract($data);
        }

        include 'app/tpl/'.$this->pageTemplate;
    }

    public abstract function generate($data, $viewTemplate, $pageTemplate);

}