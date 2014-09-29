<?php
Route::group(array('prefix' => 'api'), function () {
    Route::get('photos', 'ApiController@photos');
});