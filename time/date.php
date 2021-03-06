<?php

// 设置时区
//date_default_timezone_set("PRC");
//date_default_timezone_set("Asia/Shanghai");
date_default_timezone_set("America/Los_Angeles");

echo date("Y-m-d H:i:s") . PHP_EOL;
echo date("Y 年 m 月 d 日 H 点 i 分 s 秒") . PHP_EOL;
$time = strtotime("2018-01-18 08:08:08");  // 将指定日期转成时间戳
echo date("Y-m-d H:i:s", $time) . PHP_EOL;

echo strtotime("now"), "\n";
echo strtotime("10 September 2000"), "\n";
echo strtotime("+1 day"), "\n";
echo strtotime("+1 week"), "\n";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "\n";
echo strtotime("next Thursday"), "\n";
echo strtotime("last Monday"), "\n";
