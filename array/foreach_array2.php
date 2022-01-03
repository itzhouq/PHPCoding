<?php

// 遍历
foreach (array(1, 2, 3, 4) as &$value) {
    $value = $value * 2;
    echo "$value\n";
//    print_r($value);
}

$arr = array(1, 2, 3, 4);
foreach (array(1, 2, 3, 4) as $value) {
    $value = $value * 2;
    echo "$value\n";
//    print_r($value);
//    print_r(array());
}

//var_dump($arr);
