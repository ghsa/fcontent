<?php

namespace FContent\Interfaces;


interface FieldInterface {

    public function getType();
    public function setType($type);

    public function getName();
    public function setName($name);

    public function saveField($type, $name);


}