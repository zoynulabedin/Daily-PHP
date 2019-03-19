<?php
$str = "Hello World , World How are you?";
$tok = strtok($str," ,");

echo $tok;
// echo strtok(",");;
// echo strtok(",");;
// echo strtok(",");;



// var_dump($tok3);
// var_dump($tok4);
// var_dump($tok5);
// var_dump($tok6);
// $loopTok = strtok($str, " ,");
// while( $loopTok !== false ){
// 	echo $loopTok . PHP_EOL;
// 	$loopTok = strtok("");
// }
// $split = str_split($str);
// var_dump($split);
// $occurance = array_count_values($split);
// var_dump($occurance);
// var_dump(array_count_values(str_split($str)));