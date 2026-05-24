<?php
$name = null;
var_dump($name);

function completeOrder(){
    return "ご注文ありがとうございます。\n";
}

$function = 'completeOrder';
echo $function();

$phpfile = fopen('php://memory', 'r+');
echo "変数型の確認: ".gettype($phpfile). "\n";

fwrite($phpfile, "phpの演習ファイルです。\n");
rewind($phpfile);
//$content = fread($phpfile, 1024); 
//php://memory에 담긴 내용이 얼마나 길지 계산하기 귀찮으니 fread 대신 stream_get_contents()를 사용
$content = stream_get_contents($phpfile);
echo "内容: ".$content. "\n";

fclose($phpfile);