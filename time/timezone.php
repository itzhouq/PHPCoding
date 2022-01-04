<?php
// 时区
//date_default_timezone_set('America/Los_Angeles');
date_default_timezone_set('Asia/Shanghai');
date_default_timezone_set("PRC");

$script_tz = date_default_timezone_get();

var_dump($script_tz);
echo $script_tz . PHP_EOL;
