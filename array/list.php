<?php

// 给嵌套的数组解包
$array = [
    [1, 2],
    [3, 4],
];

foreach ($array as list($a, $b)) {
    // $a 包含嵌套数组的第一个元素，
    // $b 包含嵌套数组的第二个元素。
    echo "A: $a; B: $b\n";
}
//A: 1; B: 2
//A: 3; B: 4


foreach ($array as list(, $b)) {
    // $a 包含嵌套数组的第一个元素，
    // $b 包含嵌套数组的第二个元素。
    echo "B: $b\n";
}
//B: 2
//B: 4