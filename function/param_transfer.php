<?php

// 用引用传递函数参数
function add_some_extra(&$string)
{
    $string .= 'and something extra.';
}
$str = 'This is a string, ';
add_some_extra($str);
echo $str;    // 输出 'This is a string, and something extra.' str的值被修改

// 直接传值
function add_some_extra2($string) {
    $string .= "and something extra.";
}
$string = "I am a string, ";
add_some_extra2($string);
echo $string; // string的值不会修改
