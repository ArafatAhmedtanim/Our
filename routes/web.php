<?php

Route::group(['prefix' => 'ourjourney', 'as' => 'ourjourney.'], function () { 
	Route::get('/', ['as' => 'home', 'uses' => 'MemberController@index']);
});


Route::get('ourtour/{id}', 'CountryController@index', '$id');
Route::get('/des/{id}', 'ImageController@index', '$id');
Route::post('/like', 'LikeController@index');
Auth::routes();

