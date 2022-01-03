<?php

// 定义一个简单的数组
$array = array("foo", "bar", "hello", "world");
// 查看类型：打印数组元素的类型和值
var_dump($array);

// 使用[]获取元素的值
var_dump($array[2]); // 下标为2的元素的类型和值string(5) "hello"
var_dump($array[5]); // 不存在的下标获取到的值为NULL。同时会报警告 PHP Warning:  Undefined array key
var_dump($array[3]);
