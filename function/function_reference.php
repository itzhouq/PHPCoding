<?php
function add_some_extra(&$string) {
    $string .= 'and something extra.';
}

$str = 'This is a string, ';
add_some_extra($str);
echo $str;    // 输出 'This is a string, and something extra.'
