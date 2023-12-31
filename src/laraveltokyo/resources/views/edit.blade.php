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
    <a href="{{ route('lists.list') }}" class="btn btn-dark">←リストに戻る</a>
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
                    <div class="mb-3">
                        <select class="form-select" name="horse_track" aria-label="Default select example">
                            <option selected>{{ $post->horse_track }}</option>
                            <optgroup label="中央競馬場">
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
                            </optgroup>
                            <optgroup label="地方競馬場">
                                <option value="帯広競馬場">帯広競馬場</option>
                                <option value="門別競馬場">門別競馬場</option>
                                <option value="盛岡競馬場">盛岡競馬場</option>
                                <option value="水沢競馬場">水沢競馬場</option>
                                <option value="浦和競馬場">浦和競馬場</option>
                                <option value="船橋競馬場">船橋競馬場</option>
                                <option value="大井競馬場">大井競馬場</option>
                                <option value="川崎競馬場">川崎競馬場</option>
                                <option value="金沢競馬場">金沢競馬場</option>
                                <option value="笠松競馬場">笠松競馬場</option>
                                <option value="名古屋競馬場">名古屋競馬場</option>
                                <option value="園田競馬場">園田競馬場</option>
                                <option value="姫路競馬場">姫路競馬場</option>
                                <option value="高知競馬場">高知競馬場</option>
                                <option value="佐賀競馬場">佐賀競馬場</option>
                                <option value="海外の競馬場">海外の競馬場</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="number" placeholder="購入金額" id="tentacles" class="form-control" value="{{ $post->purchase }}" name="purchase" step="100" min="100" max="10000000000" />
                    </div>
                    <div class="mb-3">
                        <input type="number" placeholder="払戻金額" id="tentacles" class="form-control" value="{{ $post->refund }}" name="refund" step="10" max="1000000000000" />
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="types" aria-label="Default select example">
                            <option selected>{{ $post->types }}</option>
                            <option value="単勝">単勝</option>
                            <option value="複勝">複勝</option>
                            <option value="枠連">枠連</option>
                            <option value="枠単">枠単</option>
                            <option value="馬連">馬連</option>
                            <option value="馬単">馬単</option>
                            <option value="ワイド">ワイド</option>
                            <option value="３連複">３連複</option>
                            <option value="３連単">３連単</option>
                            <option value="WIN5">WIN5</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <textarea type="text" placeholder="メモ(任意)" name="memo" class="form-control">{{ $post->memo }}</textarea>
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
