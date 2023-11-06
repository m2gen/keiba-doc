<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>競馬ドック</title>
</head>

<body>

    @php
    $PurchaseTotal = 0;
    $RefundTotal = 0;
    @endphp

    @foreach($month as $post)
    @php
    $PurchaseTotal += $post['purchase'];
    $RefundTotal += $post['refund'];
    @endphp
    @endforeach

    @php
    $totalNum = $RefundTotal - $PurchaseTotal;
    @endphp

    @if($totalNum > 0)
    <h3 class="mb-4 border-bottom border-black">収支総額：<span class="text-danger h1">+{{ number_format($totalNum) }}</span> 円</h3>
    @else
    <h3 class="mb-4 border-bottom border-black">収支総額：<span class="text-primary h1">{{ number_format($totalNum) }}</span> 円</h3>
    @endif

    <div class="row mt-5 justify-content-center">
        <p class="col-md-5 p-2 h5">購入: {{ number_format($PurchaseTotal) }} 円</p>
        <p class="col-md-5 p-2 h5">払戻: {{ number_format($RefundTotal) }} 円</p>
    </div>

</body>

</html>
