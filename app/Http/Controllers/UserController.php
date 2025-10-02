<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {

        if ($user = Auth::user())
        {
            return view('index', compact('user'));
        }
        else

          return  redirect('login.form');

    }
    public function showRegisterForm()
    {
        return view('register');
    }
    public function login()
    {
        return view('login');
    }
    public function updateBioUser(Request $request)
    {   dd($user=Auth::user()->id);
        dd($request->all());
        User::updated();
    }
}
