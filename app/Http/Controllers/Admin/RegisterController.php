<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
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


    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm(){
        return view('admin.register');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:admins'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        return Admin::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

//    public function register(Request $request){
//        return $request->all();
//        $validator = Validator::make($request->all(), [
//            'name' => ['required', 'string', 'max:255'],
//            'username' => ['required', 'string', 'max:255', 'unique:admins,username'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins,email'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
//        ]);
//        if ($validator->fails()) {
//            return redirect()->back()
//                ->withErrors($validator)
//                ->withInput();
//        }
//        Admin::create([
//            'name' => $request->input('name'),
//            'username' => $request->input('username'),
//            'email' => $request->input('email'),
//            'password' => Hash::make($request->input('password')),
//        ]);
//
//        return redirect()->route('login');
//    }
}
