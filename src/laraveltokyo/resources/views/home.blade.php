@extends('layouts.app')
@section('title', '競馬ドック | ホーム')
@section('content')

{{-- 通知 --}}
@include('layouts.notification')

<div class="container pb-4">
    <div class="row justify-content-center px-3">
        {{-- 収支表示 --}}
        <div class="col-lg-8 mt-5 pb-3 text-center bg-white shadow">
            <div class="mt-3">
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
            <div class="d-flex align-items-center">
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
        </div>

        <div class="row justify-content-evenly my-5 px-0">
            {{-- 収支一覧リスト --}}
            <div class="col-lg-7 bg-white py-4 shadow">
                <div class="ms-3">
                    <p class="h4 fw-bold">収支一覧リスト</>
                    <p>登録したデータはすべて収支一覧からご覧いただけます。</p>
                    <p>編集・削除もここから。</p>
                </div>
                <ul class="list-group ms-3 mt-5">
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('lists.list') }}" class="mb-1 link-dark text-decoration-none d-block"><i class="fa-solid fa-circle me-2" style="color: #FFD43B;"></i>収支一覧を見る（新しい順）</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('lists.old') }}" class="mb-1 link-dark text-decoration-none d-block"><i class="fa-solid fa-circle me-2" style="color: #B197FC;"></i>収支一覧を見る（古い順）</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('lists.update') }}" class="mb-1 link-dark text-decoration-none d-block"><i class="fa-solid fa-circle me-2" style="color: #63E6BE;"></i>収支一覧を見る（更新順）</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('lists.purchase') }}" class="mb-1 link-dark text-decoration-none d-block"><i class="fa-solid fa-circle me-2" style="color: #74C0FC;"></i>収支一覧を見る（購入金額順）</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('lists.refund') }}" class="mb-1 link-dark text-decoration-none d-block"><i class="fa-solid fa-circle me-2" style="color: #FF6161;"></i>収支一覧を見る（払戻金額順）</a>
                    </li>
                </ul>
            </div>
            {{-- 入力フォーム --}}
            <div class="col-lg-4 mt-lg-0 mt-4 bg-white shadow">
                <form action="{{ route('home.store') }}" method="POST" class="text-center">
                    @csrf
                    <div>
                        <h4 class="mt-3 fw-bold text-dark">収支入力フォーム</h4>
                        <div class="mb-3">
                            <label for="date" class="form-label"></label>
                            <input type="date" name="date" class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" value="{{ old('date') }}">
                            @if($errors->has('date'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('date') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <select class="form-select {{ $errors->has('horse_track') ? 'is-invalid' : '' }}" name="horse_track" aria-label="Default select example">
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
                            @if($errors->has('horse_track'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('horse_track') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <input type="number" placeholder="購入金額" id="tentacles" class="form-control {{ $errors->has('purchase') ? 'is-invalid' : '' }}" name="purchase" value="{{ old('purchase') }}" step="100" min="100" max="100000000" />
                            @if($errors->has('purchase'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('purchase') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <input type="number" placeholder="払戻金額" id="tentacles" class="form-control {{ $errors->has('refund') ? 'is-invalid' : '' }}" name="refund" value="{{ old('refund') }}" step="10" min="0" max="1000000000" />
                            @if($errors->has('refund'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('refund') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="d-flex">
                            <div class="mb-3 w-75">
                                <select class="form-select {{ $errors->has('types') ? 'is-invalid' : '' }}" name="types" aria-label="Default select example">
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
                                @if($errors->has('types'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('types') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-check mb-3 ms-3 mt-2 w-25">
                                <input class="form-check-input {{ $errors->has('multi2') ? 'is-invalid' : '' }}" type="checkbox" name="multi2" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    マルチ
                                </label>
                                @if($errors->has('multi2'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('multi2') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-2">
                            <textarea type="text" placeholder="メモ(任意)" name="memo" class="form-control {{ $errors->has('memo') ? 'is-invalid' : '' }}">{{ old('memo') }}</textarea>
                            @if($errors->has('memo'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('memo') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark mb-2">保存する</button>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- グラフ --}}
<div class="container">
    <div class="bg-white shadow w-100" style="overflow: auto;">
        <div id="doc_Chart" class="mx-auto" style="height: 650px; width: 100vh;">
        </div>
    </div>
</div>

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
            isStacked: false,
            hAxis: {
                title: '日付（最大過去14日）',
                textStyle: {
                    color: '#333',
                    fontSize: 12
                },
                gridlines: {
                    color: '#f9f9f9'
                }
            },
            vAxis: {
                title: '金額',
                textStyle: {
                    color: '#333',
                    fontSize: 12
                },
                gridlines: {
                    color: '#f9f9f9'
                }
            },
            colors: ['#1b9e77', '#d95f02'],
            fontName: 'Arial',
            backgroundColor: '#ffffff',
            chartArea: {
                left: '10%',
                width: '100%',
                height: '70%'
            },
            legend: {
                position: 'top',
                alignment: 'end',
            },
            bar: {
                groupWidth: '50%'
            },
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('doc_Chart'));
        chart.draw(data, options);
    }
</script>


@endsection

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
