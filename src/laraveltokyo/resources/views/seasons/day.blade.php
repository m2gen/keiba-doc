<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>競馬ドック</title>
</head>

<body>

    <div class="container mb-4">
        <p class="d-inline p-1">{{ $today->format('Y年m月d日') }}</p>
    </div>

    <div class="container">
        @if($dayData['totalNum'] > 0)
        <h3 class="mb-3 p-1 d-inline border-bottom border-black">収支総額：<span class="text-danger h1">+{{ number_format($dayData['totalNum']) }}</span> 円</h3>
        @else
        <h3 class="mb-3 p-1 d-inline border-bottom border-black">収支総額：<span class="text-primary h1">{{ number_format($dayData['totalNum']) }}</span> 円</h3>
        @endif
        <div class="container">
            <div class="row mt-3 justify-content-center">
                <h5 class="col-md-5 p-1">購入: {{ number_format($dayData['PurchaseTotal']) }} 円</h5>
                <h5 class="col-md-5 p-1">払戻: {{ number_format($dayData['RefundTotal']) }} 円</h5>
            </div>

            <div class="row justify-content-evenly mt-2">
                <ul class="col-md-5 fs-6">
                    <li>的中率：{{ $dayData['winRate'] }} %</li>
                    <li>回収率：{{ $dayData['recovery'] }} %</li>
                    <li>最高購入額：{{ number_format($dayData['maxPurchase']) }}円</li>
                    <li>最高払戻額：{{ number_format($dayData['maxRefund']) }}円</li>
                </ul>

                <ul class="col-md-5 fs-6">
                    <li>賭けた回数：{{ number_format($dayData['registerCount']) }} 回</li>
                    <li>勝った回数：{{ number_format($dayData['winCount']) }} 回</li>
                    <li>負けた回数：{{ number_format($dayData['defeatCount']) }} 回</li>
                    <li>元返し回数：{{ number_format($dayData['sameCount']) }} 回</li>
                </ul>
            </div>
        </div>
    </div>

</body>

</html>
