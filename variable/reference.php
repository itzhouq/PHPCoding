<?php
// 引用
//$foo = 'Bob';              // 将 'Bob' 赋给 $foo
//$bar = &$foo;              // 通过 $bar 引用 $foo
//$bar = "My name is $bar";  // 修改 $bar 变量
//echo $bar;                  // My name is Bob
//echo $foo;                 // $foo 的值也被修改 My name is Bob

echo '<br>';
$a='aaa';
$b = $a;

$a = 'ccc';

echo $a; // ccc;

echo $b; // aaa