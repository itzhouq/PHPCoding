<?php
// 类型转换和覆盖的实例

$array = array(
    1    => "a",
    "1"  => "b",
    1.5  => "c",
    true => "d",
);

var_dump($array);

//array(1) {
//    [1]=>
//  string(1) "d"
//}
/**
 * String 中包含有效的十进制 int，除非数字前面有一个 + 号，否则将被转换为 int 类型。例如键名 "8" 实际会被储存为 8。另外， "08" 不会被强制转换，因为它不是一个有效的十进制整数。
Float 也会被转换为 int ，意味着其小数部分会被舍去。例如键名 8.7 实际会被储存为 8。
Bool 也会被转换成 int。即键名 true 实际会被储存为 1 而键名 false 会被储存为 0。
Null 会被转换为空字符串，即键名 null 实际会被储存为 ""。
Array 和 object 不能 被用为键名。坚持这么做会导致警告：Illegal offset type。
 */