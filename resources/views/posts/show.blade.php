@extends('layouts.app')
@section('content')
<div>
    <div class="card col-md-6 m-auto p-3">
        <p class="h1"><a class="text-dark" href="/profile/{{ $post->user->id }}">{{ $post->user->name }}</a></p>
        <hr>
        <p>{{ $post->content }}</p>
        @if ($login_user)
            <form action="{{ route('post_remove', ['id' => $post->id]) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $post->id }}">
                <input type="submit" value="削除" class="btn btn-danger mt-5"
                    onclick='return confirm("このTodoを削除しますか？")'>
            </form>
        @endif
    </div>
    <br><br>


    <div class="card col-md-6 m-auto p-3 ">
        <form action="/comment" method="post">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            @if ($login_user)
                <input type="hidden" name="user_id" value="{{ $login_user->id }}">
            @endif
            <div class="form-group">
                <textarea name="content" id="content" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <input type="submit" value="コメント" class="btn btn-primary">
        </form>
    </div>
    <br><br>
    
    @if ($post->comments->count() != 0)
        @foreach ($post->comments as $comment)
            <div class="card col-md-6 m-auto p-3 ">
                <p class="h1">{{ $comment->user->name }}</p>
                <hr>
                <p>{{ $comment->content }}</p>
            </div>
        @endforeach
    @else
        <div class="card col-md-6 m-auto p-3 ">
            <p class="text-center">コメントがありません</p>
        </div>
    @endif
</div>
@endsection