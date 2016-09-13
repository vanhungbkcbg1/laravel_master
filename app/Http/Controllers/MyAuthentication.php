<?php
/**
 * Created by PhpStorm.
 * User: hungnv
 * Date: 9/13/2016
 * Time: 7:04 PM
 */

namespace App\Http\Controllers;
use App\MyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MyAuthentication extends Controller
{


    public function authenticate(Request $request)
    {
        $email=$request->input('email');
        $password=$request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            return redirect()->intended();
        }
    }

    public function signup()
    {
        return view('auth.register');
    }
    public function login()
    {
        return view('auth.login');
    }
    public function register(Request $request)
    {
        $email=$request->input('email');
        $password=$request->input('password');

        $user=new MyUser();
        $user->name="";
        $user->email=$email;
        $user->password=Hash::make($password);
        $user->save();
    }

}