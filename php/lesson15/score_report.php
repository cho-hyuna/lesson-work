<?php
$scores = [72, 88, 95, 64, 81];

$total = 0;
foreach($scores as $score){
    $total += $score;
}
echo "合計: " . $total . "\n";

$average = 0;
$count_scores = count($scores);
$average = $total/$count_scores;
echo "平均: " . $average . "\n";

//最高点を表示する方法１目
$maxScore = $scores[0];
foreach($scores as $score){
    if($score > $maxScore){
        $maxScore = $score;
    }
}
echo "最高点: " . $maxScore . "\n";

//最高点を表示する方法２目
/*
$maxScore = $scores[0];
for($i = 1; $i < count($scores); $i++){
    if($scores[$i] > $maxScore){
        $maxScore = $scores[$i];
    }
}
echo "最高点: " . $maxScore . "\n";
*/