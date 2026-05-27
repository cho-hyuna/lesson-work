<?php
$orders = [
    ['name' => 'Taro', 'price' => 1200, 'quantity' => 2],
    ['name' => 'Hanako', 'price' => 800, 'quantity' => 1],
    ['name' => 'Ken', 'price' => 800, 'quantity' => 4]
];

function calculateOrderTotal($price, $quantity){
    return $price * $quantity;
}

function orderLabel($total){ //함수 내부에 $total 변수가 없으니 전달해줘야 함
    if($total >= 3000){
        return "高額注文";
    }
    else{
        return "通常注文";
    }
}

$sumTotal = 0;

foreach($orders as $order){
    $total = calculateOrderTotal($order['price'], $order['quantity']);
    $sumTotal += $total;
    echo $order['name'] . ": " . $total . "円 / " . orderLabel($total) . "\n";
}

echo "合計金額: " . $sumTotal . "円\n";