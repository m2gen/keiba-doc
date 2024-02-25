<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>競馬ドック</title>
</head>

<body>
    {{-- 月のデータ --}}
    <div class="container mb-4">
        <p class="d-inline p-1">{{ \Carbon\Carbon::parse($monthStart)->format('m月d日') }} ～
            {{ \Carbon\Carbon::parse($monthEnd)->format('m月d日') }}
        </p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                @if($monthData['totalNum'] > 0)
                <h3 class="mb-3 p-1 d-inline border-bottom border-black">収支総額：<span class="text-danger h1">+{{ number_format($monthData['totalNum']) }}</span> 円</h3>
                @else
                <h3 class="mb-3 p-1 d-inline border-bottom border-black">収支総額：<span class="text-primary h1">{{ number_format($monthData['totalNum']) }}</span> 円</h3>
                @endif
                <div class="container">
                    <div class="mt-4">
                        <h5 class="pt-2">購入: {{ number_format($monthData['purchaseTotal']) }} 円</h5 class="pt-2">
                        <h5 class="pt-2">払戻: {{ number_format($monthData['refundTotal']) }} 円</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="ms-md-5 text-start">
                    <ul>
                        <li><i class="fa-solid fa-play me-2" style="color: #74C0FC;"></i>的中率：{{ $monthData['winRate'] }} %</li>
                        <li><i class="fa-solid fa-play me-2" style="color: #74C0FC;"></i>回収率：{{ $monthData['recovery'] }} %</li>
                        <li><i class="fa-solid fa-play me-2" style="color: #74C0FC;"></i>最高購入額：{{ number_format($monthData['maxPurchase']) }}円</li>
                        <li><i class="fa-solid fa-play me-2" style="color: #74C0FC;"></i>最高払戻額：{{ number_format($monthData['maxRefund']) }}円</li>
                        <li><i class="fa-solid fa-play me-2" style="color: #74C0FC;"></i>賭けた回数：{{ number_format($monthData['registerCount']) }} 回</li>
                        <li><i class="fa-solid fa-play me-2" style="color: #74C0FC;"></i>勝った回数：{{ number_format($monthData['winCount']) }} 回</li>
                        <li><i class="fa-solid fa-play me-2" style="color: #74C0FC;"></i>負けた回数：{{ number_format($monthData['defeatCount']) }} 回</li>
                        <li><i class="fa-solid fa-play me-2" style="color: #74C0FC;"></i>元返し回数：{{ number_format($monthData['sameCount']) }} 回</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
