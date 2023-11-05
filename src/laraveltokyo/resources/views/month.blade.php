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

    <h3 class="mb-4">収支総額：{{ number_format($totalNum) }} 円</h3>
    <p class="m-2">購入: {{ number_format($PurchaseTotal) }} 円</p>
    <p class="m-2">払戻: {{ number_format($RefundTotal) }} 円</p>

</body>

</html>
