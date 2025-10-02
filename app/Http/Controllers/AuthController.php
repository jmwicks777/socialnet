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
            'avatar'=>'required|image|mimes:jpeg,png,jpg,gif|max:1048',
            "surname"=>"required",
            "birthday"=>"required",
            'username'=>'required|unique:users,username',
            'email'=>'required|email|unique:users',
            '_token'=>'required',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
        ]);
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        } else {
            $avatarPath = null;
        }

        User::create([
            'name'=>$validate['name'],
            "surname"=>$validate['surname'],
            "birthday"=>$validate['birthday'],
            'avatar_path'=>$avatarPath,
            'remember_token'=>$validate['_token'],
            'username'=>$validate['username'],
            'email'=>$validate['email'],
            'password'=>$validate['password'],

        ]);
        return redirect()->route('login.form');
    }
    public function loginUser(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $remember = $request->boolean('_token');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('social-net.index')->with('success', 'You are now logged in');
        }

        return back()->withErrors(['error' => 'Invalid credentials'])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.form');
    }


}
