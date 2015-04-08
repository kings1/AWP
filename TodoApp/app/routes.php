<?php

Route::get('/', array(
	'as' => 'home', 
	'uses' => 'HomeController@getIndex'
))->before('auth');
/* 
*->before('auth') Make sure a user is logged in/authenticated 
*before seeing the homepage or displaying his tasks. 
*Check filters.php file line 36 
*/

Route::post('/', array(
	'uses' => 'HomeController@postIndex'
))->before('csrf');

Route::get('/login', array(
	'as' => 'login',
	'uses' => 'AuthController@getLogin'
))->before('guest');
/* ->before('guest') ensures that a user is redirected to the 
homepage if he's already logged in. Meaning he doesn't have to 
see the login page again if he's logged in. 
Check filters.php file line 68*/ 

Route::post('login', array(
	'uses' => 'AuthController@postLogin'
))->before('csrf');
/* ->before('csrf') guards against csrf attacks */