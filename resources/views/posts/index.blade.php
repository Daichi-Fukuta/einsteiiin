@extends('layouts.app')
@section('content')
{{---------------------- ログインユーザーがいる ----------------------}}
@if ($login_user)
    <div class="m-3">
        <div class="card col-3 float-left p-3">
            <p class="h1"><a class="text-dark" href="/profile/{{ $login_user->id }}">{{ $login_user->name }}</a></p>
            <hr>
            <p>自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介
                自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介
                自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介
                自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介
            </p>
            <p>こんな感じこんな感じこんな感じこんな感じこんな感じこんな感じこんな感じこんな感じ</p>
            <hr>
            <hr>
            <hr>
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


        <div class="col-9 center-block  float-right">
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
    <div class="col-6 m-auto">
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