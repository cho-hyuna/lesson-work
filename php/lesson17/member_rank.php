<?php
//메서드 getRank(), profile()

class Member{ //포인트를 기준으로 순위를 계산하는 기능
    public $name; //데이터(속성): $name, $points
    public $points; //클래스 내부에 선언된 public $points;를 찾아갈 때, 반드시 $this->points라는 길을 통해서만 접근 가능

    public function getRank(){ //기능(메서드): getRank()
        if($this->points >= 1000){
            return "Gold";
        }
        else if($this->points >= 500){
            return "Silver";
        }
        else{
            return "Bronze";
        }
    }

    public function profile(){
        return $this->name . ": " .$this->getRank();
    }
}

// 객체 생성
$taro = new Member();
$taro->name = "Taro";
$taro->points = 1200;

$hanako = new Member();
$hanako->name = "Hanako";
$hanako->points = 700;

$ken = new Member();
$ken->name = "Ken";
$ken->points = 300;

echo $taro->profile(). "\n";
echo $hanako->profile() . "\n";
echo $ken->profile() . "\n";