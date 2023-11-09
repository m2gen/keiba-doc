<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>競馬ドック</title>
</head>

<body>

    <div class="container">
        @if($monthData['totalNum'] > 0)
        <h3 class="mb-3 p-1 border-bottom border-black">収支総額：<span class="text-danger h1">+{{ number_format($monthData['totalNum']) }}</span> 円</h3>
        @else
        <h3 class="mb-3 p-1 border-bottom border-black">収支総額：<span class="text-primary h1">{{ number_format($monthData['totalNum']) }}</span> 円</h3>
        @endif
        <div class="container">
            <div class="row mt-3 justify-content-center border-bottom border-black">
                <h5 class="col-md-5 p-1">購入: {{ number_format($monthData['PurchaseTotal']) }} 円</h5>
                <h5 class="col-md-5 p-1">払戻: {{ number_format($monthData['RefundTotal']) }} 円</h5>
            </div>

            <div class="row justify-content-evenly">
                <ul class="col-md-4 fs-6 ms-5 mt-3 text-start">
                    <li>的中率：{{ $monthData['winRate'] }} %</li>
                    <li>回収率：{{ $monthData['recovery'] }} %</li>
                    <li>最高購入額：</li>
                    <li>最高払戻額：</li>
                </ul>

                <ul class="col-md-4 fs-6 ms-5 mt-md-3 text-start">
                    <li>賭けた回数：{{ number_format($monthData['registerCount']) }} 回</li>
                    <li>勝った回数：{{ number_format($monthData['winCount']) }} 回</li>
                    <li>負けた回数：{{ number_format($monthData['defeatCount']) }} 回</li>
                    <li>元返し回数：{{ number_format($monthData['sameCount']) }} 回</li>
                </ul>
            </div>
        </div>
    </div>

</body>

</html>
