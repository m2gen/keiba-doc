@extends('layouts.app')

@push('style')
<style>
    .card {
        background-color: #FDFDDB;
    }
</style>
@endpush
@section('title', '競馬ドック | 編集フォーム')
@section('content')
<div class="container">
    <div class="row justify-content-center mx-1">
        <div class="col-lg-4 card shadow mt-5">
            <form action="{{ route('list') }}" method="POST" class="text-center">
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
                <button type="submit" class="btn btn-dark mb-3">更新する</button>
            </form>
        </div>
    </div>
</div>
@endsection
