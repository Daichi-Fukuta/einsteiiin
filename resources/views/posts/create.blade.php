@extends('layouts.app')
@section('content')
<div class="card col-md-6 m-auto text-center form-group p-5">
    <form action="/posts/store" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <textarea class="form-control" id="content" name="content" rows="10"></textarea>
        <input type="submit" value="投稿" class="btn btn-primary btn-block mt-3">
    </form>
</div>
@endsection