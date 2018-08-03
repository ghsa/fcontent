<?php

namespace FContent;

use FContent\Models\Page;
use FContent\Interfaces\PageInterface;



class PageHandler {


    private $pageResource;
    private $page;
    //private $patternSearch = '/\$fcontent\[[\'\"]([a-zA-Z:_.0-9\s]*)[\'\"]\]/i'; // Restrict pattern
    private $patternSearch = '/\$fcontent\[[\'\"](.+?)[\'\"]\]/i';
    private $patternDefault = '/@@(.+:.+)=[\"\'](.+?)[\"\']/i';
    

    public function __construct(PageInterface $page)
    {

        $this->page = $page;
        $pagePath = $page->getAbsolutePath();


        if(!file_exists($pagePath)) {
            throw new \ErrorException("File doesn't exists.");
        }
        $this->pageResource = file_get_contents($pagePath);

    }

    private function getPath($pageName) 
    {
        $pagePath = base_path().'/resources/views/'.$pageName;
        return $pagePath;
    }

    public function readPageFields()
    {
        
        preg_match_all($this->patternSearch, $this->pageResource, $matches);

        $arrayDefaultValues = $this->readPageFieldDefaultValues();

       
        
        foreach($matches[1] as $match) {
            try{
                $match  = trim($match);
                list($type, $name) = explode(":", $match);
                $default = !empty($arrayDefaultValues[$match]) ? $arrayDefaultValues[$match] : null;
        
                $this->createOrUpdateField($type, $name, $default);

            }catch(\Exception $e) {
                dump($e->getMessage());
            }
        }

        
    }

    private function readPageFieldDefaultValues()
    {
        preg_match_all($this->patternDefault, $this->pageResource, $matches);

        $arrayDefaultValues = [];
        $flag = 0;
        foreach($matches[1] as $match) {
            $arrayDefaultValues[$match] = $matches[2][$flag];
            $flag++; 
        }
        return $arrayDefaultValues;
    }


    private function createOrUpdateField($type, $name, $default = null) 
    {
        $this->page->createOrUpdateField($type, $name, $default);
    }
 
}
