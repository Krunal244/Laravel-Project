<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class RegisterController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Register Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	*/
	
	use RegistersUsers;
	
	/**
	 * Where to redirect users after login / registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';
	protected $registerView = 'auth.register';
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}
	
	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'first_name' => 'required|max:255',
		    'last_name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:6|confirmed',
		    'phone' => 'required|numeric',
		    'image' => 'required|image|mime:jpg,jpeg,png'
		]);
	}
	
	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	protected function create(array $data)
	{
	    $confirmation_code = str_random(30);
	    
		User::create([
			'first_name' => $data['first_name'],
		    'last_name' => $data['last_name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		    'phone' => $data['phone'],
		    'image' => '',
		    'is_admin' => 0,
		    'confirmation_code' => $confirmation_code
		]);
		 $email = $data['email'];
		 Mail::send('email', 
		     ['confirmation_code' => $confirmation_code], 
		     function($message) use ($email)  {
		    $message->to($email)
		    ->subject('Verify your email address');
		});
		    
		 return redirect()->route('login')->with('status', 'We have sent you verification mail.');
	}
	
	public function confirm($confirmation_code)
	{
	    $user = User::whereConfirmationCode($confirmation_code)->first();
	    $user->confirmed = 1;
	    $user->confirmation_code = null;
	    if($user->save() == 1){
	        return redirect()->route('login')->with('status', 'You have successfully verified your account.');
	    } else {
	        return redirect()->route('login')->with('status', 'Something went wrong.');
	    }
	}
}
