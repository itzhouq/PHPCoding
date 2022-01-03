<?php
// 数组测试
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('html_errors', false);
// 简单数组:
$array = array(1, 2);
$count = count($array);

for ($i = 0; $i < $count; $i++) {
    echo "\n检查 $i: \n";
    echo "坏的: " . $array['$i'] . "\n";
    echo "好的: " . $array[$i] . "\n";
    echo "坏的: {$array['$i']}\n";
    echo "好的: {$array[$i]}\n";
}
