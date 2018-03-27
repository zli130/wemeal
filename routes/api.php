<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('_api')->middleware('auth:api')->group(function(){
    Route::resource('/users', 'UserController');
});


