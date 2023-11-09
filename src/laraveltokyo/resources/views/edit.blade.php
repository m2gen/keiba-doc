@extends('layouts.app')

@section('title', '競馬ドック | 編集フォーム')

@section('content')
<!-- 入力エラーアラート -->
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type=" button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container mt-4">
    <a href="{{ route('list') }}" class="btn btn-dark">←リストに戻る</a>
</div>

<div class="container">
    <div class="row justify-content-center mx-1">
        <div class="col-lg-4 card shadow mt-3">
            @foreach($posts as $post)
            <form action="{{ route('update', ['id' => $post['id']]) }}" method="POST" class="text-center">
                @endforeach
                @csrf
                <div class="card-body">
                    <h4>編集フォーム</h4>
                    @foreach($posts as $post)
                    <div class="mb-3">
                        <label for="date" class="form-label"></label>
                        <input type="date" name="date" value="{{ $post->date }}" class="form-control">
                    </div>
                    <div class="mb-2">
                        <select class="form-select" name="horse_track" aria-label="Default select example">
                            <option selected>{{ $post->horse_track }}</option>
                            <option value="札幌競馬場">札幌競馬場</option>
                            <option value="函館競馬場">函館競馬場</option>
                            <option value="新潟競馬場">新潟競馬場</option>
                            <option value="福島競馬場">福島競馬場</option>
                            <option value="中山競馬場">中山競馬場</option>
                            <option value="東京競馬場">東京競馬場</option>
                            <option value="中京競馬場">中京競馬場</option>
                            <option value="京都競馬場">京都競馬場</option>
                            <option value="阪神競馬場">阪神競馬場</option>
                            <option value="小倉競馬場">小倉競馬場</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="purchase" class="form-label">購入金額</label>
                        <input type="number" id="tentacles" class="form-control" value="{{ $post->purchase }}" name="purchase" step="100" min="100" max="10000000000" />
                    </div>
                    <div class="mb-2">
                        <label for="refund" class="form-label">払戻金額</label>
                        <input type="number" id="tentacles" class="form-control" value="{{ $post->refund }}" name="refund" step="10" max="1000000000000" />
                    </div>
                    <div class="mb-2">
                        <label for="memo" class="form-label">メモ(任意)</label>
                        <textarea type="text" name="memo" class="form-control">{{ $post->memo }}</textarea>
                    </div>
                    @endforeach
                </div>
                <div class="text-center mb-3">
                    <button type="submit" class="btn btn-dark w-75">更新する</button>
                </div>
            </form>
            @foreach($posts as $post)
            <form action="{{ route('delete', ['id' => $post['id']]) }}" method="POST" class="text-center mb-3">
                @csrf
                <button class="btn btn-danger w-75">削除する</button>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection
