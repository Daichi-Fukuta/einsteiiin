<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Todo;

class TodoController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, Todo::$rules);
        $todo = new Todo;
        $form = $request->all();
        unset($form['_token']);
        $todo->fill($form)->save();
        return redirect(route('user_show', ['id' => $request->user_id]));
    }

    public function remove(Request $request)
    {
        $login_user = Auth::user();
        $todo = Todo::find($request->id);
        if ($login_user->id != $todo->user_id) {
          return redirect('/');
        }
        $todo->delete();
        return redirect(route('user_show', ['id' => $login_user->id]));
    }
}