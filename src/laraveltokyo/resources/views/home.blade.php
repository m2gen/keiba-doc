@extends('layouts.app')
@section('title', '競馬ドック | ホーム')
@section('content')
@push('style')
<style>
    .nav-pills .nav-link.active {
        background-color: #000;
        color: #fff;
        font-weight: bold;
    }

    .nav-pills .nav-link {
        color: #000;
    }
</style>
@endpush
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
<!-- 登録成功アラート -->
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container">

    <div class="row justify-content-md-center">
        <!-- 収益表示ページ -->
        <div class="card mt-5 mx-2 col-xl-6 shadow text-center">
            <div class="card-link mt-3">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item ms-3" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">全期間合計</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">日別</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">週別</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">月別</button>
                    </li>
                </ul>
            </div>
            <div class="card-body d-flex align-items-center">
                <div class="container-fluid">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                            @include('seasons.total')
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                            @include('seasons.day')
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                            @include('seasons.week')
                        </div>
                        <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">
                            @include('seasons.month')
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <a href="{{ route('lists.list') }}" class="btn btn-dark mb-3">収支一覧を見る</a>
            </div>
        </div>

        <!-- 入力フォーム -->
        <div class="col-xl-4 mt-5 mx-2 ms-lg-2 card shadow">
            <form action="{{ route('home.store') }}" method="POST" class="text-center">
                @csrf
                <div class="card-body">
                    <h4 class="mt-2">収支入力フォーム</h4>
                    <div class="mb-3">
                        <label for="date" class="form-label"></label>
                        <input type="date" name="date" class="form-control" value="{{ old('date') }}">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="horse_track" aria-label="Default select example">
                            <option value="" selected>競馬場を選択</option>
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
                        <input type="number" placeholder="購入金額" id="tentacles" class="form-control" name="purchase" value="{{ old('purchase') }}" step="100" min="100" max="100000000" />
                    </div>
                    <div class="mb-3">
                        <input type="number" placeholder="払戻金額" id="tentacles" class="form-control" name="refund" value="{{ old('refund') }}" step="10" min="0" max="1000000000" />
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="types" aria-label="Default select example">
                            <option value="" selected>馬券の種類を選択</option>
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
                        <textarea type="text" placeholder="メモ(任意)" name="memo" class="form-control">{{ old('memo') }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark mb-3">保存する</button>
            </form>
        </div>
    </div>

    <!-- グラフ -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', {
            packages: ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', '日付');
            data.addColumn('number', '購入金額');
            data.addColumn('number', '払戻金額');
            data.addRows([
                @php
                foreach($graphPosts as $graphPost) {
                    echo "['$graphPost->date', $graphPost->purchase, $graphPost->refund], ";
                }
                @endphp
            ]);


            var options = {
                title: '購入・払戻金額推移',
                pointSize: 7,
                hAxis: {
                    title: '過去18日分の収支データ'
                },
                vAxis: {
                    title: '金額'
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('doc_Chart'));
            chart.draw(data, options);
        }
    </script>

    <div class="row justify-content-center mb-5">
        <div class="card col-xl-10 m-3 p-4 shadow" style="overflow:auto;">
            <div class=" card-body">
                <div id="doc_Chart" style="height: 600px; width:100%;" />
            </div>
        </div>
    </div>

</div>
@endsection
