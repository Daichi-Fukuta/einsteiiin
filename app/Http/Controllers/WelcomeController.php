<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
  public function welcome()
  {
    $login_user = Auth::user();
    return view('welcomes.welcome', ['login_user' => $login_user]);
  }
}
