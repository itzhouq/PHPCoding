<?php
// 重建索引

$a = array(1 => 'one', 2 => 'two', 3 => 'three');
var_dump($a);
unset($a[2]);
var_dump($a);
/* 该数组将被定义为
   $a = array(1 => 'one', 3 => 'three');
   而不是
   $a = array(1 => 'one', 2 =>'three');
*/

$b = array_values($a);
var_dump($a);
// 现在 $b 是 array(0 => 'one', 1 =>'three')
