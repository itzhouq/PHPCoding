<?php

// 多返回值
function small_numbers()
{
    return [0, 1, 2];
}
// 使用短数组语法将数组中的值赋给一组变量
[$zero, $one, $two] = small_numbers();
echo $zero;
echo $one;
echo $two;

// 在 7.1.0 之前，唯一相等的选择是使用 list() 结构
list($zero, $one, $two) = small_numbers();
echo $zero;
echo $one;
echo $two;
