<?php

// 函数返回值：引用
function &returns_reference()
{
    $someref = 1;
    return $someref;
}

// 引用赋值：引用赋值意味着两个变量指向了同一个数据，没有拷贝任何东西。
$newref =& returns_reference();

echo $newref;
