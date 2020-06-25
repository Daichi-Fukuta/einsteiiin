@extends('layouts.app')
@section('content')
@foreach ($posts as $post)
    <a href="/posts/{{ $post->id }}">
        <table>
            <p><tr><th>投稿</th><th>投稿者</th></tr></p>
            <p><tr><td>{{ $post->content }}</td><td>{{ $post->user->name }}</td></tr></p>
        </table>
    </a>
@endforeach
@endsection