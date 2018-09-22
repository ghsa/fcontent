<?php

namespace FContent;

use FContent\Interfaces\PageInterface;
use FContent\Models\Field;
use Illuminate\Support\Facades\Blade;


class FContent {


    public function render(PageInterface $page, $vars = [])
    {
        $fcontent = $this->getArrayFields($page);
        $vars['fcontent'] = $fcontent;
        return view($page->getName(), $vars);
    }

    public function renderInDevelopment(PageInterface $page, $vars = [])
    {
        $pageHandler = new PageHandler($page);

        $pageHandler->cleanPage();
        
        $pageHandler->readPageFields();

        $fcontent = $this->getArrayFields($page);
        $vars['fcontent'] = $fcontent;
        return view($page->getName(), $vars);

    }
  
    private function getArrayFields(PageInterface $page)
    {
        $fields = $page->getFields();
        $pagePath = $page->getAbsolutePath();

        if(!file_exists($pagePath)) {
            throw new \ErrorException("File doesn't exists.");
        }

        $pageResource = file_get_contents($pagePath);

        $arrayFields = [];

        foreach($fields as $field)
        {
            $arrayFields[Field::getNameByType($field->type).":".$field->name] = $field->value;
        }

        return $arrayFields;
    }


    

}