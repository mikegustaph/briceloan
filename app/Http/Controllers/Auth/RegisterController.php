<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/home';

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
            'first_name'  => ['required|string|max:255'],
            'last_name'   => ['required|string|max:255'],
            'sex'         => ['required|string|max:25'],
            'email'       => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile'      => ['required|string|max:25'],
            'password'    => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name'  => $data['first_name'],
            'last_name'   => $data['last_name'],
            'sex'         => $data['sex'],
            'email'       => $data['email'],
            'mobile'      => $data['phone'],
            'profile_img' => $data['profile_img'] ?? null,
            'address'     => $data['address'],
            'cv'          => $data['cv'] ?? null,
            'position'    => $data['position'],
            'password'    => Hash::make($data['password']),
            'role_id'     => $data['role_id']
        ]);
        //return redirect()->route('user.systemuser')->with('success', 'You have successfully registered!');
    }
}
