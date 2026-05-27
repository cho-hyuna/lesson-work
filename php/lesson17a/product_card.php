<?php

class Products{
    public $productName;
    public $productPrice;
    public $stock;

    public function isAvailable(){
       if($this->stock >= 1){
        return "在庫あり";
       }
       else{
        return "在庫なし";
       }
    }

    public function cardText(){

        $title = $this->productName;

        if($this->stock <= 0){
            $title = "[SOLD OUT] " . $title;
        }

        return $title . " / " . $this->productPrice . "円 / " . $this->isAvailable();
    }

}

$pen = new Products();
$pen->productName = "Pen";
$pen->productPrice = 120;
$pen->stock = 12;

$notebook = new Products();
$notebook->productName = "Notebook";
$notebook->productPrice = 260;
$notebook->stock = 0;

$bag = new Products();
$bag->productName = "Bag";
$bag->productPrice = 2800;
$bag->stock = 3;

echo $pen->cardText(). "\n";
echo $notebook->cardText(). "\n";
echo $bag->cardText(). "\n";