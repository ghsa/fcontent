<?php

namespace FContent\Interfaces;


interface PageInterface {

    public function getAbsolutePath();

    public function getId();
    
    public function getName();
    public function setName($name);
    
    public function getPath();
    public function setPath($path);

    public function savePage();

    public function createOrUpdateField($type, $name);

}