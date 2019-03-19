<?php 
$data = __DIR__ . "/assets/text.txt";



$students = [
    [
        'fname' =>'zoynul',
        'lname' =>'abedin',
        'age'   =>28,
        'deg'   =>'wpdev'
    ],
    [
        'fname' =>'sabbir',
        'lname' =>'hossain',
        'age'   =>28,
        'deg'   =>'forntdev'
    ],
];



$fo = fopen($data,'w');

$array_data = json_encode($students);

file_put_contents($data,$array_data,LOCK_EX);

$json_decode = file_get_contents($data);

$studentinfo = json_decode($json_decode,true);

print_r($studentinfo);










