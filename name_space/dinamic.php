<?php

// 动态访问
class classname {
    function __construct() {
        echo __METHOD__, "\n";
    }

    function newMethod() {
        echo __METHOD__, "\n";
    }
}

function funcname() {
    echo __FUNCTION__, "\n";
}
const constname = "global";

$a = 'classname';
$obj = new $a; // 输出 classname::__construct
$obj -> newMethod();
$b = 'funcname';
$b(); // 输出 funcname
echo constant('constname'), "\n"; // 输出 global
