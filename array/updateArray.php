<?php

// 修改数组元素

$arr = array(5 => 1, 12 => 2);
var_dump($arr);

// 添加了一个元素
$arr[] = 56;    // 这与 $arr[13] = 56 相同;
var_dump($arr);
// 在脚本的这一点上

$arr["x"] = 42; // 添加一个新元素
// 键名使用 "x"
var_dump($arr);

unset($arr[5]); // 从数组中删除元素
var_dump($arr);

unset($arr);    // 删除整个数组
