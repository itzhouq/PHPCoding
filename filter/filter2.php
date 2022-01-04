<?php

// 选项和标志位
$var = 300;

$int_options = array(
    "options" => array
    (
        "default" => -1,
        "min_range" => 0,
        "max_range" => 256
    )
);

$filter_var = filter_var($var, FILTER_VALIDATE_INT, $int_options);
echo $filter_var . PHP_EOL;

if (!filter_var($var, FILTER_VALIDATE_INT, $int_options)) {
    echo("不是一个合法的整数");
} else {
    echo("是个合法的整数");
}
