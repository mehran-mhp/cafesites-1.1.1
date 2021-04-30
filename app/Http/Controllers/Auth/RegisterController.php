<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],[
            'name.required'=>'لطفا نام خود را وارد کنید',
            'name.string'=>'ورودی شما باید از نوع متن باشد',
            'name.max'=>'تعداد ورودی بیش از حد مجاز میباشد',

            'email.required'=>'لطفا ایمیل خود را وارد کنید',
            'email.string'=>'ورودی شما باید از نوع ایمیل باشد',
            'email.email'=>'لطفا یک ایمیل وارد کنید',
            'email.max'=>'تعداد ورودی بیش از حد مجاز میباشد',
            'email.unique'=>'این ایمیل قبلا ثبت شده است',

            'password.required'=>'لطفا رمز ورود خود را وارد کنید',
            'password.string'=>'ورودی شما باید از نوع متن باشد',
            'password.min'=>'رمز ورود باید بیشتر از 8 کاراکتر باشد',
            'password.confirmed'=>'تکرار رمز ورود مطابقت ندارد',
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
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
