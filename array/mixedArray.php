<?php

// 混合数组
$array = array(
    "foo" => "bar",
    "bar" => "foo",
    100 => -100,
    -100 => 100,
);
var_dump($array);

//array(4) {
//    ["foo"]=>
//  string(3) "bar"
//    ["bar"]=>
//  string(3) "foo"
//    [100]=>
//  int(-100)
//  [-100]=>
//  int(100)
//}

