<?php
//주문 금액-정수, 회원 상태-진위

const FREE_SHIPPING_PRICE = 5000;
const MEMBER_SHIPPING_FEE = 300;
const NONMEMBER_SHIPPING_FEE = 600;

function calculateShippingFee(int $orderPrice, bool $isMember){

    if($orderPrice >= FREE_SHIPPING_PRICE){
        return 0;
    }
    else if($isMember){
        return MEMBER_SHIPPING_FEE;
    }
    else {
        return NONMEMBER_SHIPPING_FEE;
    }
}

function buildShippingMessage(int $orderPrice, $isMember){
    $shippingFee = calculateShippingFee($orderPrice, $isMember);

    if($isMember){
        $currentMember = "はい";
    }else{
        $currentMember = "いいえ";
    }

    $message = "注文金額: {$orderPrice}円\n";
    $message .= "会員: {$currentMember}\n";
    $message .= "送料: {$shippingFee}円\n";

    return $message;

}

echo buildShippingMessage(4200, false);