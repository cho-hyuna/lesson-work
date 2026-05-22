<?php
class Message{
    public function text():string{
        return "こんにちは。 \n";
    }
}

class WelcomeMessage extends Message{
    public function text():string{
        return parent::text() . "初めまして、ようこそ！ \n";
    }
}

$welcomemessage = new WelcomeMessage();
echo $welcomemessage -> text();