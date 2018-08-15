<?php

namespace FContent\Facades;

use Illuminate\Support\Facades\Facade;

class FContent extends Facade {

    protected static function getFacadeAccessor()
    {
        return "FContent.fcontent";
    }

}

