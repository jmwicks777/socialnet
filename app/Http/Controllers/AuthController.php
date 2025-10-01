<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /**
     * @return View
     */
    public function showRegisterForm():view
    {
        return view('register');
    }
    public function createUser(Request $request)
    {
        $validate=$request->validate([
            'name'=>'required',
            'username'=>'required|unique:users,username',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
        ]);
        User::create([
            'name'=>$validate['name'],
            'username'=>$validate['username'],
            'email'=>$validate['email'],
            'password'=>$validate['password'],

        ]);
        return redirect()->route('login.form');
    }
    public function loginUser(Request $request)
    {


        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if (Auth::attempt($credentials))
        {
         $request->session()->regenerate();
         return redirect()->route('user.index')->with('success', 'You are now logged in');
        }
        return back()->withErrors(['error' => 'Invalid credentials']);

    }


}
