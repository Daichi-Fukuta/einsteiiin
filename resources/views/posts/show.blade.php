@extends('layouts.app')
@section('content')
<p>
    {{ $post->user->name }}
    <hr>
    {{ $post->content }}
    <hr>
    @if ($login_user->id == $post->user->id)
        <form action="{{ route('post_remove', ['id' => $post->id]) }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $post->id }}">
            <input type="submit" value="削除" onclick='return confirm("この投稿を削除しますか？")'>
        </form>
    @endif
</p>

@endsection