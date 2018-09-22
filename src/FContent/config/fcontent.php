<?php

return [

     /*
    |--------------------------------------------------------------------------
    | Middleware of authentication
    |--------------------------------------------------------------------------
    |
    | This is the authentication middlware used to autorize access to the fcontent 
    | control panel.
    |
    */

    'auth_middleware' => 'fcontent.auth',

    /*
    |--------------------------------------------------------------------------
    | Drive used to do uploads
    |--------------------------------------------------------------------------
    |
    | Driver used to do uploads in fcontent panel
    |
    */

    'file_driver' => 'public',

    /*
    |--------------------------------------------------------------------------
    | HTML editor
    |--------------------------------------------------------------------------
    |
    | Enable html summer note editor in HTML fields on fcontent panel
    |
    */

    'html_summernote' => false
    
];
