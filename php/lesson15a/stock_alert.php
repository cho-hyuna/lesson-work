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
}//true, false 반환

$minStock = null; //재고가 5개 이하인 상품들 중에서도 가장 적은 상품을 담을 바구니
$lowestStock = 9999;

foreach($products as $product){

   if(isLowStock($product['stock'])){
   echo "{$product['name']}: {$product['stock']}個\n";
   // Notebook-4, Eraser-2

   if($product['stock'] < $lowestStock){ // 4<999 // 2<4
    $lowestStock = $product['stock']; // lowestStock=4 // lowestStock=2
    $minStock = $product; //배열 통째로 저장. 
    //$minStock = [["name" => "Notebook", "stock" => 4],["name" => "Eraser", "stock" => 2]]
   };
   }
}

echo "対象件数: {$minStock['stock']}件\n";