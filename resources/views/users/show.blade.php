@extends('layouts.app')
@section('content')

@if ($login_user)
    <div class="m-2">
        <div class="card col-md-3 float-left p-3 mt-3">
            <span class="h1">{{ $user->name }}</span>
            @if ($login_user->id == $user->id)
                <span><a href="{{ route('user_edit', ['id' => $login_user->id]) }}">編集</a></span>
            @endif
            <hr>
            @if ($user->description)
                <p>{{ $user->description }}</p>
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

        @if ($posts->count() == 0)
            <div class="col-md-9 center-block float-right mt-3">
                <div class="card p-2 text-center">
                  投稿がありません。
                </div>
            </div>
        @else
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
        @endif
    </div>
@endif
@endsection