<?php
//주문 금액-정수, 회원 상태-진위

function calculateShippingFee(int $orderPrice, $isMember){
    if($orderPrice >= 5000){
        return 0;
    }
    else if($isMember){
        return 300;
    }
    else {
        return 600;
    }
}

function buildShippingMessage(int $orderPrice, $isMember){
    $shippingFee = calculateShippingFee($orderPrice, $isMember);

    if($isMember){
        $member = "はい";
    }else{
        $member = "いいえ";
    }

    $message = "注文金額: {$orderPrice}円\n";
    $message .= "会員: {$member}\n";
    $message .= "送料: {$shippingFee}円\n";

    return $message;

}

echo buildShippingMessage(4200, false);