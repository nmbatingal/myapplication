<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Offices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $offices = Offices::orderBy('div_name', 'ASC')->get();

        return view('auth.register', compact('offices'));
    }

    public function usernameExist(Request $request)
    {
        $username = User::where('username', '=', $request['username'])->exists();

        if ( $username ) {
            echo 'false';
        } else {
            echo 'true';
        }
    }

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
            /*'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',*/
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        //return $this->registered($request, $user) ?: redirect($this->redirectPath());

        return redirect('/login')->with('info', 'Confirm user credentials to the <strong>system administrator</strong> first before using your account.');
    }*/

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'username'      => $data['username'],
            'password'      => bcrypt('dostcaraga'),
            'lastname'      => ucwords($data['lastname']),
            'firstname'     => ucwords($data['firstname']),
            'middlename'    => ucwords($data['middlename']),
            'email'         => $data['email'],
            'mobile_number' => $data['contact_number'], 
            'div_unit'      => $data['division_unit'], 
            'position'      => $data['position'],
        ]);

        /*$user
            ->roles()
            ->attach(Role::where('name', 'member')->first());*/

        return $user;
    }


}
