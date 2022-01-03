<?php
// 向函数传递数组

function takes_array($input) {
    echo "$input[0] + $input[1] = ", $input[0] + $input[1];
}

$arr = array(1, 4, 32, 66);
takes_array($arr); // 1 + 4 = 5
