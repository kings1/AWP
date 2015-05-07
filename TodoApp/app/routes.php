<?php

Route::bind('task', function($value, $route){
	return Item::where('id', $value)->first();
});


Route::get('/', array(
	'as' => 'home', 
	'uses' => 'HomeController@getIndex'
))->before('auth');
/* ->before('auth') Make sure a user is logged in/authenticated before seeing the homepage or displaying his tasks. Check filters.php file line 36 */


/*Route for submitting form inputs when checkboxes are clicked*/
Route::post('/', array(
	'uses' => 'HomeController@postIndex'
))->before('csrf');

/*Get route for new task page*/
Route::get('/new', array(
	'as' => 'new',
	'uses' => 'HomeController@getNew'
));

/*Post route to submit new task */
Route::post('/new', array(
	'uses' => 'HomeController@postNew'
))->before('csrf');


Route::get('/delete/{task}', array(
	'as' => 'delete',
	'uses' => 'HomeController@getDelete'
));

Route::get('/login', array(
	'as' => 'login',
	'uses' => 'AuthController@getLogin'
))->before('guest');
/* ->before('guest') ensures that a user is redirected to the homepage if he's already logged in. Meaning he doesn't have to see the login page again if he's logged in. Check filters.php file line 68*/ 

Route::post('login', array(
	'uses' => 'AuthController@postLogin'
))->before('csrf');
/* ->before('csrf') guards against csrf attacks */

Route::get('/signup', array(
	'as' => 'signup',
	'uses' => 'AuthController@getSignup'
))->before('guest');

Route::post('signup', array(
	'uses' => 'AuthController@postSignup'
))->before('csrf');

Route::get('logout', array(
	'uses' => 'AuthController@getLogout'
));