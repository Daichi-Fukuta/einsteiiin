<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;
use App\User;
use App\Post;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function show(Request $request)
  {
    $login_user = Auth::user();
    $user = User::find($request->id);
    $posts = $user->posts;
    return view('users/show', [
      'login_user' => $login_user,
      'user' => $user,
      'posts' => $posts,
      ]);
  }

  public function edit(Request $request)
  {
    $login_user = Auth::user();
    $user = User::find($request->id);
    if ($login_user->id != $user->id) {
      return redirect('/');
    }
    return view('users/edit', [
      'user' => $user,
      'login_user' => $login_user,
      ]);
  }

  public function update(Request $request)
  {
    $this->validate($request, User::$rules);
    $user = User::find(Auth::user()->id);
    $param = [
      'name' => $request->name,
      'description' => $request->description,
      'email' => $request->email,
    ];
    $user->update($param);

    return redirect(route('user_show', ['id' => $user->id]));
  }

  public function remove(Request $request)
  {
    $login_user = Auth::user();
    $user = User::find($request->id);
    if ($login_user->id != $user->id) {
      return redirect('/');
    }
    $user->delete();
    return redirect('/');
  }
}
