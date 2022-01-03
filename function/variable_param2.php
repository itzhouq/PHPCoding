<?php

// 可变参数的函数:可变参数传递数组
function add($a, $b) {
    return $a + $b;
}

echo add(...[1, 2])."\n"; // 3

$a = [1, 2];
echo add(...$a); // 3
