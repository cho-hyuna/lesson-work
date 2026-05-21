<?php
class User
{
    public string $name;
    public function greet(): string
    {
        return"こんにちは、{$this->name}さん";
    }
}

$user = new User();
$user->name = "Taro";

echo $user->greet() . "\n";