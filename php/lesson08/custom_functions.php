<?php
function formatUserName(string $name){
    return "{$name}さん";
}

echo formatUserName('Taro') . "\n";
