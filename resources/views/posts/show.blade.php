@extends('layouts.app')
@section('content')
<div class="card col-6 m-auto p-3">
    <p class="h1"><a class="text-dark" href="/profile/{{ $post->user->id }}">{{ $post->user->name }}</a></p>
    <hr>
    <p>{{ $post->content }}</p>
    @if ($login_user)
        <form action="{{ route('post_remove', ['id' => $post->id]) }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $post->id }}">
            <input type="submit" value="削除" class="btn btn-danger mt-5"
                onclick='return confirm("この投稿を削除しますか？")'>
        </form>
    @endif
</div>
@endsection