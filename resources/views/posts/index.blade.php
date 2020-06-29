@extends('layouts.app')
@section('content')
{{---------------------- ログインユーザーがいる ----------------------}}
@if ($login_user)
    <div class="m-2">
        <div class="card col-md-3 float-left p-3 mt-3 d-none d-md-block">
            <p class="h1"><a class="text-dark" href="/profile/{{ $login_user->id }}">{{ $login_user->name }}</a></p>
            <hr>
            @if ($login_user->description)
                <p>{{ $login_user->description }}</p>
                <hr>
            @endif
            <h4>ToDo</h4>
            <hr>
            <ul>
                <li>ToDo</li><br>
                <li>ToDo</li><br>
                <li>ToDo</li><br>
                <li>ToDo</li><br>
                <li>ToDo</li><br>
            </ul>
        </div>


        <div class="col-md-9 center-block float-right mt-3">
            @foreach ($posts as $post)
                <div class="card p-2">
                    <a class="text-dark" href="/posts/{{ $post->id }}">
                      <h4>{{ $post->user->name }}</h4>
                      <p>{{ $post->content }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
{{---------------------------------------------------------------------------------------------------}}
@else
{{---------------------- ログインユーザーがいない ----------------------}}
    <div class="col-md-8 m-auto">
        @foreach ($posts as $post)
            <div class="card p-2">
                <a class="text-dark" href="/posts/{{ $post->id }}">
                  <h4>{{ $post->user->name }}</h4>
                  <p>{{ $post->content }}</p>
                </a>
            </div>
        @endforeach
    </div>
{{---------------------------------------------------------------------------------------------------}}
@endif
@endsection