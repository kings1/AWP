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
			/*Laravel automatically hashes the pw*/
			'password' => Input::get('password')
		), false); /*false indicates no checkbox for remember me.*/

		/*If wrong credentials are provided*/
		if (!$auth) {
			return Redirect::route('login')->withInput()->withErrors(array(
				'Invalid credentials. Please try again.'
			));
		}
		/*If credentials are correct*/
		return Redirect::route('home');
	}	


	public function getSignup(){
		return View::make('signup');
	}

	public function postSignup(){
		$input = Input::all();

		$rules = array(
			'name' => 'required|unique:users',
			'email' => 'required|unique:users|email',
			'password' => 'required'
		);

		$validator = Validator::make($input, $rules);

		if ($validator->passes()) {
			$password = $input['password'];
			$password = Hash::make($password);

			$user = new User();
			$user->name = $input['name'];
			$user->email = $input['email'];
			$user->password = $password;
			$user->save();

			return Redirect::to('login');
		}else{
			return Redirect::to('signup')->withInput()->withErrors($validator);
		}

	}

	public function getLogout() {
	  Auth::logout();
		return Redirect::route('login');
		//return Redirect::home();
	}

}