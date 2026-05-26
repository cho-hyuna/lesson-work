<?php
$products = [
    ["name" => "Pen", "stock" => 12],
    ["name" => "Notebook", "stock" => 4],
    ["name" => "Eraser", "stock" => 2],
    ["name" => "Bag", "stock" => 8]
];

//echo $products[0]["name"];
echo "在庫アラート\n"; 

function isLowStock($stock){
    return $stock <= 5;
}

foreach($products as $product){
   if(isLowstock($product['stock'])){
   echo "{$product['name']}: {$product['stock']}個\n";

   if ($product['stock'] <= 3){
    echo "対象件数: {$product['stock']}件\n";
   }
   }
}

/*
foreach($products as $product){
   if($product['stock'] <= 5){
    echo"{$product['name']}: {$product['stock']}個\n";
   }
}
*/