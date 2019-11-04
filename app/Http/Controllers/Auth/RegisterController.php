<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

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
    protected $redirectTo = '/validate/register/success';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'home_address' => ['required', 'string', 'max:255'],
            'postal_address' => ['required', 'string'],
            'country' => ['required'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile_number' => ['required', 'string', 'max:255', 'unique:users'],
            'occupation' => ['required', 'string', 'max:255'],
            'account_type' => ['required'],
            'residency' => ['required', 'string', 'max:255'],
            'next_of_kin' => ['required', 'string', 'max:255'],
            'ssn' => ['required', 'unique:users'],
            // 'next_of_kin' => ['required', 'string', 'max:255'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'welcome_message' => ['required', 'string', 'max:255']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name'         => $data['first_name'],
            'last_name'          => $data['last_name'],
            'middle_name'        => $data['middle_name'],
            'home_address'       => $data['home_address'],
            'postal_address'     => $data['postal_address'],
            'country'            => $data['country'],
            'gender'             => $data['gender'],
            'email'              => $data['email'],
            'mobile_number'      => $data['mobile_number'],
            'occupation'         => $data['occupation'],
            'account_type'       => $data['account_type'],
            'residency'          => $data['residency'],
            'next_of_kin'        => $data['next_of_kin'],
            'welcome_message'    => $data['welcome_message'],
            'ssn'                => $data['ssn'],
            'user_serial_number' => str_random(2).time(),
            'account_number'     => date("d")."1".time(), 
            'password'           =>  Hash::make(123456), 
            'isVerified'         => 0
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    public function successRegister()
    {
        return view('auth.success', ['url' => 'user']);
    }


    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }


    protected function createAdmin(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/admin');
    }
}
