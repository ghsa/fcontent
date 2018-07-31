<?php


Route::group(['prefix' => 'fcontent', 'as' => 'fcontent.', 'middleware' => 'web'], function () {

    Route::get('/login', 'AuthController@login')->name('login');
    Route::post('/auth', 'AuthController@auth')->name('auth');
    Route::get('/logout', 'AuthController@logout')->name('logout');

   


    Route::get('/', 'PageController@index')->name('home');
    
    Route::group(['prefix' => '/page', 'as' => 'page.'], function() {
        
        Route::get('/', 'PageController@index')->name('index');
        Route::get('/insert', 'PageController@insert')->name('insert');
        Route::get('/reload/{id}', 'PageController@reload')->name('reload');
        Route::get('/editContent/{id}', 'PageController@editContent')->name('editContent');
        Route::post('/save', 'PageController@save')->name('save');
        Route::post('/saveContent', 'PageController@saveContent')->name('saveContent');
        Route::get('/delete', 'PageController@delete')->name('delete');

    });




});