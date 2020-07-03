@extends('layouts.app')
@section('content')

<form action="/" method="get">
    <input type="text" name="keyword" value="{{ $keyword }}">
    <input type="submit" value="検索">
</form>
{{---------------------- ログインユーザーがいる ----------------------}}
@if ($login_user)
    <div class="m-2">
        <div class="card col-md-3 float-left p-3 mt-3 d-none d-md-block">
            <p class="h1"><a class="text-dark" href="/profile/{{ $login_user->id }}">{{ $login_user->name }}</a></p>
            <hr>
            @if ($login_user->description)
                <p>{{ $login_user->description }}</p>
                <hr>
            @endif
            <h4>ToDo</h4>
            <form action="/todo" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ $login_user->id }}">
                <input type="text" name="content">
                <input type="submit" value="作成" class="btn btn-primary">
            </form>
            <hr>
            @if ($login_user->todos->count() == 0)
                <p>Todoはありません。</p>
            @else
                @foreach ($login_user->todos as $todo)
                    <table style="table-layout:fixed;width:100%;">
                        <tr>
                            <th class="mb-3" style="word-wrap:break-word;">{{ $todo->content }}</th>
                            <td class="text-center">
                                <form action="{{ route('todo_remove', ['id' => $todo->id]) }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $todo->id }}">
                                    <input type="submit" value="完了" class="btn btn-success btn-sm">
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <th><hr></th>
                            <td><hr></td>
                        </tr>
                    </table>
                @endforeach
            @endif
        </div>


        <div class="col-md-9 center-block float-right mt-3">
          @if ($search_posts->count())
            @foreach ($search_posts as $post)
                <div class="card p-2">
                    <a class="text-dark" href="/posts/{{ $post->id }}">
                      <h4>{{ $post->user->name }}</h4>
                      <p>{{ $post->content }}</p>
                    </a>
                </div>
            @endforeach
          @else
              <span class="text-center">「{{ $keyword }}」</span> <span>に関する投稿は見つかりませんでした...</span>
          @endif
        </div>
    </div>
{{---------------------------------------------------------------------------------------------------}}
@else
{{---------------------- ログインユーザーがいない ----------------------}}
    <div class="col-md-8 m-auto">
        @if ($search_posts->count())
            @foreach ($search_posts as $post)
                <div class="card p-2">
                    <a class="text-dark" href="/posts/{{ $post->id }}">
                      <h4>{{ $post->user->name }}</h4>
                      <p>{{ $post->content }}</p>
                    </a>
                </div>
            @endforeach
        @else
            <span class="text-center">「{{ $keyword }}」</span> <span>に関する投稿は見つかりませんでした...</span>
        @endif
    </div>
{{---------------------------------------------------------------------------------------------------}}
@endif
@endsection