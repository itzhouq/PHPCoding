<?php

// 过滤器
// 过滤变量
$int = 123;

if (!filter_var($int, FILTER_VALIDATE_INT)) {
    echo("不是一个合法的整数");
} else {
    echo("是个合法的整数");
}

$url = "http://www.google.com";
$filter_var = filter_var($url, FILTER_SANITIZE_ENCODED);
echo $filter_var;
