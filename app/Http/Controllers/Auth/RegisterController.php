<?php

namespace App\Http\Controllers\Auth;

use App\Models\AuthenticatedUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

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
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:authenticated_user',
            'password' => 'string|min:5|confirmed',
            'bithdate' => 'date|before_or_equal:' . now()->subYears(13),
            'username' => 'string|max:255|unique:authenticated_user',
        ],
        [
            'name.string' => 'Must be of type string',
            'name.max' => 'Max of 255 characters',
            'email.string' => 'Must be of type string',
            'email.max' => 'Max 255 characters',
            'email.email' => 'Must be email format',
            'email.unique' => 'Email already used',
            'birthdate.date' => 'Must be of type date',
            'birthdate.before_or_equal' => 'Must be older than 13 years old',
            'username.max' =>'Max of 255 characters',
            'username.unique' =>'Username already used',
            'username.string' => 'Must be of type string',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\AuthenticatedUser
     */
    protected function create(Request $request)
    {
        return AuthenticatedUser::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'birthdate' => $request->input('birthdate'),
            'username' => $request->input('username')
        ]);
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        event(new Registered($user = $this->create($request)));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    public function showRegistrationForm(){
        return view('auth.register', ['user' => 'visitor', 'needsFilter' => 0]);
    }
}
