<?php

function formatOrderPrice(string $name, int $price): string
{
    if($price <= 0){
        throw new Exception('金額が正しくありません');
    }

    return $name . ': ' . $price . '円';
}

$items = [
    ['name' => 'Book', 'price' => 1200],
    ['name' => 'Pen', 'price' => 500],
    ['name' => 'Bag', 'price' => 3500],
];

foreach($items as $item){
    try{
        echo formatOrderPrice($item['name'], $item['price']) . PHP_EOL;
    } catch (Exception $e){
        echo $item['name'] . ': ' . $e->getMessage() . PHP_EOL;
    }
}