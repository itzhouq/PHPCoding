<?php

// 全局类、函数和常量
namespace Foo;

function strlen() {
    return 'strlen() function';
}
const INI_ALL = 3;
class Exception {

}

//$a = strlen('hi'); // 调用此命名空间的strlen
//$b = \strlen('hi'); // 调用全局函数strlen
$c = INI_ALL; // 访问此命名空间常量 INI_ALL
$d = \INI_ALL; // 访问全局常量 INI_ALL
$e = new Exception('error'); // 实例化此命名空间的 Exception
$f = new \Exception('error'); // 实例化全局类 Exception

//echo $a . PHP_EOL; // strlen() function
//echo $b . PHP_EOL; // 2

echo $c . PHP_EOL; // 3
echo $d . PHP_EOL; // 7

$e;
$f;
