<?php 

class AuthController extends Controller {
	public function getLogin(){

		return View::make('login');
	}

	public function postLogin(){
		/*For validation*/
		$rules = array(
			'username' => 'required', 
			'password' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('login')->withErrors($validator);
		}

		/*For authentication*/
		$auth = Auth::attempt(array(
			/*Match against the db values*/
			'name' => Input::get('username'),
			'password' => Input::get('password')
		), false); //false indicates no checkbox for remember me


		if (!$auth) {
			return Redirect::route('login')->withErrors(array(
				'Invalid credentials.'
			));
		}

		return Redirect::route('home');
	}	

}