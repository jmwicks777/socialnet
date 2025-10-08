<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function forgotPassword()
    {
        return view('forgot-password');
    }
    public function index()
    {
        $posts = Auth::user()->posts()->get()->toArray();
        //dd(User::find(Auth::id())->get()->toArray());
        if ($user = Auth::user())
        {
            return view('index', compact('user', 'posts'));
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
    {
        $userID=Auth::user()->id;
        $user = User::find($userID);
        $user->update([
            'name'=>$request['name'],
            'surname'=>$request['surname'],
            'username'=>$request['username'],
        ]);
        return redirect()->back();
    }
    public function search(Request $request)
    {

        return (1);
    }
    public function createPost(Request $request)
    {

        Post::create([
            'user_id'=>Auth::id(),
            'body'=>$request['content'],
            'visibility'=>$request['visibility'],
        ]);
        return redirect()->back();
    }
    public function deletePost($id)
    {
        Post::find($id)->delete();
        return redirect()->back();
    }
}
