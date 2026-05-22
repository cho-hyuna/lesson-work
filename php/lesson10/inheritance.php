<?php
class Person{
    public function eat(){
        return 'ご飯を食べます';
    }
}

class Student extends Person{
    public function study(){
        return '学校で勉強します';
    }
}

class Worker extends Person{
    public function work(){
        return '会社に行きます';
    }
}

$student = new Student();
echo "学生: \n";
echo $student -> eat() . "\n";
echo $student -> study() . "\n";

$worker= new Worker();
echo "会社員: \n";
echo $worker -> eat() . "\n";
echo $worker -> work() . "\n";
