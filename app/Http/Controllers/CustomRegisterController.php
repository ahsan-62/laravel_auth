<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegistrationStoreRequest;
use Illuminate\Support\Facades\Auth;

class CustomRegisterController extends Controller
{
    public function registerFormShow()
    {
    return view('custom-auth.register');
    }

    public function registerUser(RegistrationStoreRequest $request)
    {
        // dd($request->all());
        User::create([
              'name'=>$request->name,
              'email'=>$request->email,
              'phone'=>$request->phone,
              'password'=>Hash::make($request->password),

        ]);
        //credential array
        $credentials=[
              'email'=>$request->email,
              'password'=>$request->password,

        ];
//login attemp if login then direct to home..
        if(Auth::attempt($credentials)){
          $request->session()->regenerate();
          return redirect()->intended('home');
        }

        //error message if wrong email
        return back()->withErrors([
            'email'=>'Wrong Credentials Found!'
        ])->onlyInput('email');
    }

    public function loginFormShow()
    {
            return view('custom-auth.login');
    }

    public function loginUser( loginUserRequest $request)
    {
    //    dd($request->all());

       $credentials=[
        'email'=>$request->email,
        'password'=>$request->password,

        ];
            //login attemp if login then direct to home..
            if(Auth::attempt($credentials,$request->filled('remember'))){
                $request->session()->regenerate();
                return redirect()->intended('home');
            }

            //error message if wrong email
            return back()->withErrors([
                'email'=>'Wrong Credentials Found!'
            ])->onlyInput('email');
    }

    public function logout( Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect()->route('login');

    }
}
