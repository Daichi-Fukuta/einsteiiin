@extends('layouts.app')
@section('content')

@if ($login_user)
    <div class="m-3">
        <div class="card col-3 float-left p-3">
            <span class="h1">{{ $user->name }}</span>
            @if ($login_user->id == $user->id)
                <span><a href="{{ route('user_edit', ['id' => $login_user->id]) }}">編集</a></span>
            @endif
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
        
        @if ($posts->count() == 0)
            <div class="col-9 center-block float-right ">
                <div class="card p-2 text-center">
                  投稿がありません。
                </div>
            </div>
        @else
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
        @endif
    </div>
@endif
@endsection