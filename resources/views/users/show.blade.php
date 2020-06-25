@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->name }}さん</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>{{ $user->name }}</p>
                    <table>
                        <tr><th>投稿</th></tr>
                        @if ($user->posts != null)
                            @foreach ($user->posts as $post)
                                <tr><td>{{ $post->content }}</td></tr>
                            @endforeach
                        @endif
                        <tr><td></td></tr>
                    </table>
                    @if ($login_user->id == $user->id)
                        <p><a href="{{ route('user_edit', ['id' => $login_user->id]) }}">編集</a></p>
                        <form action="{{ route('user_remove', ['id' => $login_user->id]) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $login_user->id }}">
                            <input type="submit" value="削除" onclick='return confirm("このアカウント削除しますか？")'>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
