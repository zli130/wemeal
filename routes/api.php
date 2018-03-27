<?php

use Illuminate\Http\Request;


Route::prefix('user')->group(function(){
    Route::get('/all', 'UserController@userApi');
});