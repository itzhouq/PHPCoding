<?php
// 合法的常量名
define("FOO",     "something");
define("FOO2",    "something else");
const FOO_BAR = "something more";

// 非法的常量名
//define("2FOO",    "something");

// 下面的定义是合法的，但应该避免这样做：(自定义常量不要以__开头)
// 也许将来有一天 PHP 会定义一个 __FOO__ 的魔术常量
// 这样就会与你的代码相冲突
//const __FOO__ = "something";

echo FOO;
echo FOO2;
echo FOO_BAR;
