<?php
// 引用

$arr = array(1, 2, 3, 4);
foreach ($arr as &$value) {
    $value = $value * 2;
}

var_dump($arr);

// 现在 $arr 是 array(2, 4, 6, 8)
unset($value); // 最后取消掉引用
var_dump($arr);
