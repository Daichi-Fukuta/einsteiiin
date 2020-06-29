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
                <p class="mb-5">{{ $user->description }}</p>
            @endif
            <h4>ToDo</h4>
            @if ($login_user->id == $user->id)
                <form action="/todo" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="text" name="content">
                    <input type="submit" value="作成" class="btn btn-primary">
                </form>
            @endif
            <hr>
            @if ($todos->count() == 0)
                <p>Todoはありません。</p>
            @else
                @foreach ($todos as $todo)
                    <table style="table-layout:fixed;width:100%;">
                        <tr>
                            <th class="mb-3" style="word-wrap:break-word;">{{ $todo->content }}</th>
                            <td class="text-center">
                                @if ($login_user->id == $user->id)
                                    <form action="{{ route('todo_remove', ['id' => $todo->id]) }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $todo->id }}">
                                        <input type="submit" value="完了" class="btn btn-success btn-sm">
                                    </form>
                                @endif
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