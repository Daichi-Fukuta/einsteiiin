@extends('layouts.app')
@section('content')
<div>
    <div class="card col-md-6 m-auto p-3">
        <p class="h1"><a class="text-dark" href="/profile/{{ $post->user->id }}">{{ $post->user->name }}</a></p>
        <hr>
        <p>{{ $post->content }}</p>

        @if ($login_user && $login_user->id == $post->user->id)
            <form action="{{ route('post_remove', ['id' => $post->id]) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $post->id }}">
                <input type="submit" value="削除" class="btn btn-danger mt-5"
                    onclick='return confirm("この投稿を削除しますか？")'>
            </form>
        @endif
    </div>
    <br><br>

    @if ($login_user)
        <div class="card col-md-6 m-auto p-3 ">
            <form action="/comment" method="post">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="hidden" name="user_id" value="{{ $login_user->id }}">
                <div class="form-group">
                    <textarea name="content" id="content" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <input type="submit" value="コメント" class="btn btn-primary">
            </form>
        </div>
      @else
          <div class="card col-md-6 m-auto p-3">
              <textarea cols="30" rows="10" readonly="readonly" class="text-secondary">※コメントをするにはログインが必要です。</textarea>
          </div>
      @endif
    <br><br>
    
    @if ($post->comments->count() != 0)
        @foreach ($post->comments as $comment)
            <div class="card col-md-6 m-auto p-3 ">
                <a class="text-dark" href="/profile/{{ $comment->user->id }}"><p class="h1">{{ $comment->user->name  }}</p></a>
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