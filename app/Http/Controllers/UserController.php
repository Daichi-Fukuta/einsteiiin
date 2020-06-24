<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;
use App\User;

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
    return view('users/show', ['login_user' => $login_user, 'user' => $user]);
  }

  public function edit(Request $request)
  {
    $auth_user = Auth::user();
    $user = User::find($request->id);
    if ($auth_user->id != $user->id) {
      return redirect('/');
    }
    return view('users/edit', ['user' => $user]);
  }

  public function update(Request $request)
  {
    $this->validate($request, User::$rules);
    $user = Auth::user();
    $param = [
      'name' => $request->name,
      'email' => $request->email,
    ];
    User::find($user->id)->update($param);
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
