@extends('layouts.app')
@section('content')

<form action="/posts/store" method="post">
    <table>
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <tr><th>content: </th><td><textarea name="content"></textarea></td></tr>
        <tr><th></th><td><input type="submit" value="投稿"></td></tr>
    </table>
</form>
@endsection